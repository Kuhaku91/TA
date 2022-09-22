@component('mail::message')
# {{ $data['title'] }}
 
Pemberitahuan tentang surat Peringatan {{$data['sp']}}!!.
kepada orang tua wali siswa dengan nama
{{$data['name']}}
 
silahkan print surat peringatan di menu Surat Peringatan!

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent