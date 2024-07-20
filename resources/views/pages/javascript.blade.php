@php
$user = "Javascript";
@endphp
<script>
    var data = @json($user);
    console.log(data)
</script>
