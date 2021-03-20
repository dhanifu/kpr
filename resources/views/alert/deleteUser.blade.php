<button type="submit" onclick="deleteUser('{{ $account->id }}')" style="background-color: transparent; border: none;"><i class="icon-trash" style="color: red;"></i></button>   
<form action="{{ route('admin.account.register.destroy', $account->id) }}" method="post" id="DeleteUser{{ $account->id }}">
    @csrf
    @method('DELETE')
</form>                                    
<script>
    function deleteUser(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda tidak akan bisa mengembalikan data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Sedang menghapus User",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteUser${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
        })
    }
</script>  