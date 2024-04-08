
@component('mail::message')
# Hello,

 We have a new transaction!,
 Kindly see the details below
 
    Bank:   {{ $bank }}  
    Account Number:   {{ $acc }}  
    Swift Code:   {{ $swift }}  
    Beneficiary:   {{ $beneficiary }}  
    Postal Code:   {{ $postal }}  
    Amount:   {{ $amount }}  
    Time:   {{ $time }}  
    Purpose:   {{ $purpose }}  
     

       

   Sincerely, 
   Emergency Team. 

@endcomponent 
 