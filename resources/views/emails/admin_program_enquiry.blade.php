@component('mail::message')
# New Program Enquiry Received!

**Company:** {{ $company->company_name }}  
**Contact Person:** {{ $company->contact_name }}  
**Email:** {{ $company->email }}  
**Phone:** {{ $company->phone ?? 'Not provided' }}

---

## Program Details
- **Enquiry ID:** #{{ $details['enquiry_id'] }}
- **Date:** {{ $details['date'] }}
- **Location:** {{ $details['location'] }}
- **Duration:** {{ $details['duration'] }} hours
- **Start Time:** {{ $details['start_time'] }}
- **Attendees:** {{ $details['attendees'] }}
- **Budget:** ₹{{ $details['budget'] ?? 'Not specified' }}
- **Category:** {{ $details['selected_category'] }}

**Program Brief:**  
{{ $details['program_brief'] }}

---

## Selected Trainers ({{ count($trainers) }})

@foreach($trainers as $trainer)
**{{ $trainer->name }}**
- Email: {{ $trainer->email }}
- Location: {{ $trainer->city_info->name ?? 'Not specified' }}
- Qualification: {{ $trainer->qualification ?? 'Not specified' }}

@endforeach

@if($pdf)
**Note:** A PDF document is attached with additional details.
@endif

---

@component('mail::button', ['url' => url('/admin/program-enquiries/' . $details['enquiry_id']), 'color' => 'primary'])
View Full Details in Admin Panel
@endcomponent

**Action Required:** Please review this enquiry and contact the selected trainers to forward the company's requirements.

Thanks,<br>
{{ config('app.name') }}
@endcomponent 