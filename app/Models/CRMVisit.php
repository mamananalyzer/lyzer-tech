<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRMVisit extends Model
{
    use HasFactory;

    protected $table = 'crm_visit';
    protected $primaryKey = 'id_visit';
    protected $fillable = [
        'id_visit',
        'customer_name', // Name of the customer
        'location', // Location of the customer
        'contact_person', // Person to meet at the customer site
        'contact_number', // Contact number of the person
        'visit_date', // Date of the visit
        'visit_time', // Time of the visit
        'purpose', // Purpose of the visit
        'notes', // Notes from the visit
        'customer_feedback', // Feedback from the customer
        'next_steps', // Next actions after the visit
        'follow_up_date', // Date for follow-up actions
        'status', // Visit status (e.g., Planned, Completed)
        'image', // Path to an uploaded image or document
        'updated_at',
        'created_at'
    ];
}
