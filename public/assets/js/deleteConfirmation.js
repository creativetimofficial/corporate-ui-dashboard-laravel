document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission
            const form = this.closest('form'); // Get the closest form element
            const productName = this.getAttribute('data-product-name'); // Get the product name from the data attribute

            Swal.fire({
                title: 'Are you sure?',
                text: `You won't be able to revert this! The product "${productName}" will be deleted.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                }
            });
        });
    });
});
