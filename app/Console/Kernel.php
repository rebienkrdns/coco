<?php

namespace App\Console;

use App\Models\File;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
  /**
   * The Artisan commands provided by your application.
   *
   * @var array
   */
  protected $commands = [
    //
  ];

  /**
   * Define the application's command schedule.
   *
   * @param \Illuminate\Console\Scheduling\Schedule $schedule
   * @return void
   */
  protected function schedule(Schedule $schedule)
  {
    $schedule->call(function () {
      $actualDate = Carbon::now();

      $customers = User::select('users.id', 'users.name', 'customer_plan.created_at as contractedDate', 'time_lapses.days')->where('roles.name', 'Cliente')
        ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', 'roles.id')
        ->join('customer_plan', 'users.id', 'customer_plan.id_user')
        ->join('time_lapses', 'customer_plan.id_time_lapse', 'time_lapses.id')
        ->get();

      foreach ($customers as $customer) {
        if (Carbon::parse($customer->contractedDate)->diffInDays($actualDate, false) >= $customer->days) {
          $files = File::where('id_user', $customer->id)->get();
          foreach ($files as $file) {
            Storage::disk('local')->delete($file->file);
            $file->delete();
            Log::info("El archivo $file->file del usuario $customer->name fue borrado!");
          }
        }
      }
    })->daily();
  }

  /**
   * Register the commands for the application.
   *
   * @return void
   */
  protected function commands()
  {
    $this->load(__DIR__ . '/Commands');

    require base_path('routes/console.php');
  }
}
