<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>

  @include('layouts.includes.styles')
</head>
<body>

  <?
    $skillsArray = array();
    foreach ($skills as $skill) {

      array_push($skillsArray, [
        "id" => $skill->id,
        "name" => $skill->label,
        "type" => $skill->skillType->name
      ]);
    }

    $userData = array(
      "monthly_salary" => $user_data->monthly_salary,
      "available_hours_per_week" => $agent->available_hours_per_week,
      "photo" => $user_data->avatar,
      "job_title" => $user_data->job_title,
      "salary" => $agent->hourly_rate
    );
  ?>
  
  <div id="freelancerResume">
    <freelancer-resume :freelancer="{{ json_encode(array(
      "id" => $user->id,
      "firstName" => $user->firstName,
      "lastName" => $user->lastName,
      "projects" => array()
    )) }}"
      :skills="{{ json_encode($skillsArray) }}"
      :works_history="{{ json_encode($worksHistory) }}"
      :educations_history="{{ json_encode($educationsHistory) }}"
      :user_data="{{ json_encode($userData) }}"
      ></freelancer-resume>
  </div>

  @include('layouts.includes.scripts')
</body>
</html>