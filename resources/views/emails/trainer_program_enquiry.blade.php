@component('mail::message')
# New Program Enquiry!

Hello {{ $trainer->name }},

You have been shortlisted for a new program enquiry from **{{ $company->company_name }}**.

---

## Event Details
- **Date:** {{ $details['date'] }}
- **Location:** {{ $details['location'] }}
- **Duration:** {{ $details['duration'] }} hours
- **Start Time:** {{ $details['start_time'] }}
- **Attendees:** {{ $details['attendees'] }}
- **Approx Budget:** ₹{{ $details['budget'] }}

**Program Brief:**
{{ $details['program_brief'] }}

@if($pdf)
---
A PDF is attached with more details about the program.
@endif

@component('mail::button', ['url' => url('/')])
View Your Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 