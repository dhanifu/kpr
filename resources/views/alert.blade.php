@if($message = Session::get('access'))
<script>
    swal ( "Middleware" ,  '{{ $message }}' ,  "error" )
</script>
@endif
@if($message = Session::get('success'))
<script>
    swal( "System Success", '{{ $message }}' , 'success' )
</script>
@endif
@if($message = Session::get('error'))
<script>
    swal( "System Error", '{{ $message }}' , 'error' )
</script>
@endif
@if($message = Session::get('info'))
<script>
    swal('System Info', '{{ $message }}' , 'info')
</script>
@endif
