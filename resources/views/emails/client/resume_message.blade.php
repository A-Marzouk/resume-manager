@component('mail::message')
# {{$emailData['header']}}
### From: {{$from['name']}} ({{$from['email']}})
### Resume URL: {{$emailData['actionURL']}}
### Message body:
<div class="message-body">
{{$emailData['body']}}
</div>

@php
    $url = $emailData['actionURL'];
@endphp

@component('mail::button', ['url' => "$url"])
    {{$emailData['actionText']}}
@endcomponent

Thanks,<br>
{{$emailData['footer']}}
@endcomponent

<style>
    body {
        color: #888DB1 !important;
    }

    .message-body{
        white-space: pre-wrap;
    }

    body>table>tbody>tr>td>table>tbody>tr:nth-child(2)>td>table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td>table {
        float: left !important;
    }

    .button .button-primary {
        background-color: #0046FE !important;
        border-bottom: 8px solid #0046FE !important;
        border-left: 18px solid #0046FE !important;
        border-right: 18px solid #0046FE !important;
        border-top: 8px solid #0046FE !important;
        border-radius: 5px !important;
    }

    .mail-hyper-link{
        text-decoration: none;
    }
</style>