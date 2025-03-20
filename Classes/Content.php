<?php 

class Content {
    public function subject($data) {
        return "Invoice {$data["invoice_number"]} – Gwadar Gymkhana";
    }
    public function body($data) {
        return "Dear {$data['fullname']},

            I hope you’re doing well. We have prepared invoice #{$data['invoice_number']} for your reference.  
            You can find all the relevant details in the attached document. If you have any questions or require any assistance, feel free to reach out.

            For any inquiries, you can contact us at +9221 111-946-111.

            Best regards,  
            Gwadar Gymkhana";
        
    }
}