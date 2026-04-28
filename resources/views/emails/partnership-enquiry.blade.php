<x-mail::message>
# New Partnership Enquiry

You have received a new partnership request.

---

**Name:** {{ $data['name'] }}

**Company / Brand:** {{ $data['company'] }}

**Email:** {{ $data['email'] }}

**WhatsApp:** {{ $data['phone'] ?? '—' }}

**Budget Range:** {{ $data['budget_range'] ?? '—' }}

---

**Message:**

{{ $data['message'] }}

---

*Reply directly to this email to respond to {{ $data['name'] }}.*

<x-mail::button :url="'mailto:' . $data['email']">
Reply to {{ $data['name'] }}
</x-mail::button>

Huruhara Running Community
</x-mail::message>
