<!-- Tombol WhatsApp dengan ikon -->
<a href="https://wa.me/{{ $kontaknowa }}" class="btn btn-success btn-sm" target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>
<a href="{{ route('home.spots', $model->id) }}" class="btn btn-primary btn-sm">View</a>
<a href="{{ route('spot.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<button href="{{ route('spot.destroy', $model) }}" class="btn btn-danger btn-sm delete-btn">Delete</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('deleteForm').action = href
                document.getElementById('deleteForm').submit()
                
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    })
</script>
