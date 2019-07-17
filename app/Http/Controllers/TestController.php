<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserData;
use App\Agent;

class TestController extends Controller
{
    function createAgents () {

        // User 1: Osbel Torres
        $user = new User();

        $user->email = 'osbeltorres@gmail.com';
        $user->password = bcrypt('osbel123');
        $user->username = 'OsbelTorres';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Osbel';
        $userData->last_name = 'Torres';
        $userData->phone = '+584121231212';
        $userData->country = 'Venezuela';
        $userData->city = 'Caracas';
        $userData->job_title = 'Motion Designer';
        $userData->available_hours_per_week = 35.00;
        $userData->monthly_salary = 980;
        $userData->gender = 'M';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();
        
        // User 2: Martin Hernandez
        $user = new User();

        $user->email = 'martin@gmail.com';
        $user->password = bcrypt('martin123');
        $user->username = 'MartinHernandez';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Martin';
        $userData->last_name = 'Hernandez';
        $userData->phone = "+344121231212";
        $userData->country = 'Spain';
        $userData->city = 'Madrid';
        $userData->job_title = 'UX/UI designer';
        $userData->available_hours_per_week = 30.00;
        $userData->monthly_salary = 1200;
        $userData->gender = 'M';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();
        
        // User 3: Sophia Brown
        $user = new User();

        $user->email = 'sophiabrown@gmail.com';
        $user->password = bcrypt('sophia123');
        $user->username = 'SophiaBrown';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Sophia';
        $userData->last_name = 'Brown';
        $userData->phone = '+444121231212';
        $userData->country = 'England';
        $userData->city = 'London';
        $userData->job_title = 'Illustrator';
        $userData->available_hours_per_week = 40.00;
        $userData->monthly_salary = 1800;
        $userData->gender = 'F';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();

        // User 4: Sarah Knight
        $user = new User();

        $user->email = 'sarahknight@gmail.com';
        $user->password = bcrypt('sarah123');
        $user->username = 'SarahKnight';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Sarah';
        $userData->last_name = 'Knight';
        $userData->phone = '+14121231212';
        $userData->country = 'United States';
        $userData->city = 'Miami';
        $userData->job_title = 'Digital artist';
        $userData->available_hours_per_week = 40.00;
        $userData->monthly_salary = 1600;
        $userData->gender = 'F';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();

        // User 5: Alan Brito Delgado
        $user = new User();

        $user->email = 'alan_brito_delgado@gmail.com';
        $user->password = bcrypt('alan123');
        $user->username = 'AlanBritoDelgado';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Alan';
        $userData->last_name = 'Brito Delgado';
        $userData->phone = '+52121231212';
        $userData->country = 'Mexico';
        $userData->city = 'Guadalajara';
        $userData->job_title = 'UI/UX designer';
        $userData->available_hours_per_week = 40.00;
        $userData->monthly_salary = 1300;
        $userData->gender = 'M';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();
        
        // User 6: Elsa Pato
        $user = new User();

        $user->email = 'elsapato@gmail.com';
        $user->password = bcrypt('elsa123');
        $user->username = 'ElsaPato';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Elsa';
        $userData->last_name = 'Pato';
        $userData->phone = '+52121231312';
        $userData->country = 'Mexico';
        $userData->city = 'Guadalajara';
        $userData->job_title = 'Illustrator';
        $userData->available_hours_per_week = 40.00;
        $userData->monthly_salary = 1400;
        $userData->gender = 'F';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();

        // User 7: Aquiles Boy
        $user = new User();

        $user->email = 'aquilesboy@gmail.com';
        $user->password = bcrypt('aquiles123');
        $user->username = 'AquilesBoy';

        $user->save();

        // User Data
        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->first_name = 'Aquiles';
        $userData->last_name = 'Boy';
        $userData->phone = '+52131231212';
        $userData->country = 'Mexico';
        $userData->city = 'Guadalajara';
        $userData->job_title = 'Motion designer';
        $userData->available_hours_per_week = 40.00;
        $userData->monthly_salary = 1700;
        $userData->gender = 'M';
        $userData->profession_id = 3;
        $userData->currency_id = 1;

        $userData->save();

        // Agent Data
        $agentData = new Agent();
        $agentData->user_id = $user->id;
        $agentData->available_hours_per_week = $userData->available_hours_per_week;
        $agentData->hourly_rate = $userData->monthly_salary * 12 / 52 / $agentData->available_hours_per_week;
        
        $agentData->save();
        
        dd('Created users');
    }
}
