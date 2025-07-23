<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Wishlist Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }
        .company-info {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #007bff;
        }
        .trainer-list {
            margin: 20px 0;
        }
        .trainer-item {
            background-color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .trainer-name {
            font-weight: bold;
            color: #007bff;
        }
        .category-badge {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #6c757d;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Company Wishlist Notification</h1>
        <p>{{ $category }} Category Trainers Selected</p>
    </div>
    
    <div class="content">
        <div class="company-info">
            <h3>Company Details</h3>
            <p><strong>Company Name:</strong> {{ $company->company_name }}</p>
            <p><strong>Contact Person:</strong> {{ $company->contact_name }}</p>
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Phone:</strong> {{ $company->phone ?? 'Not provided' }}</p>
            <p><strong>Website:</strong> {{ $company->website ?? 'Not provided' }}</p>
        </div>

        <h3>Selected Trainers ({{ $category }} Category)</h3>
        <p><strong>Total Trainers Selected:</strong> {{ count($trainers) }}</p>

        <div class="trainer-list">
            @foreach($trainers as $trainer)
            <div class="trainer-item">
                <div class="trainer-name">{{ $trainer->name }}</div>
                <p><strong>Email:</strong> {{ $trainer->email }}</p>
                <p><strong>Phone:</strong> {{ $trainer->phone ?? 'Not provided' }}</p>
                <p><strong>Location:</strong> {{ $trainer->city_info->name ?? 'Not specified' }}</p>
                <p><strong>Designation:</strong> {{ $trainer->designation ?? 'Not specified' }}</p>
                <p><strong>Qualification:</strong> {{ $trainer->qualification ?? 'Not specified' }}</p>
                <span class="category-badge">{{ $category }}</span>
            </div>
            @endforeach
        </div>

        @if(!empty($details))
        <h3>Program Details</h3>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            @foreach($details as $key => $value)
                @if($key !== 'selected_category')
                <tr>
                    <td><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong></td>
                    <td>{{ $value }}</td>
                </tr>
                @endif
            @endforeach
            <tr>
                <td><strong>Selected Category</strong></td>
                <td><span class="category-badge">{{ $details['selected_category'] ?? $category }}</span></td>
            </tr>
        </table>
        @endif

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px;">
            <h4>Action Required</h4>
            <p>Please review the selected trainers and contact the company if needed. You can access the admin panel to view more details about these trainers.</p>
        </div>
    </div>
    
    <div class="footer">
        <p>This is an automated notification from the Cortra system.</p>
        <p>&copy; {{ date('Y') }} Cortra. All rights reserved.</p>
    </div>
</body>
</html> 