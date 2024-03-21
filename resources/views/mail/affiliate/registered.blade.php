<x-mail::message>

<h2>Affiliate Registration Data</h2>

<x-mail::table>
| Name          | {{$affiliate->name}}     |
| :-----------: | :----------------------: |
| Email         | {{$affiliate->email}}    |
| Contact No.   | {{$affiliate->phone}}    |
| District      | {{$affiliate->location}} |
</x-mail::table>

<x-mail::button :url="$url">
Verify Now
</x-mail::button>

</x-mail::message>
