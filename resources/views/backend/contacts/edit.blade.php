<x-main-layout title="Contact Control">


    <x-slot name="header">
        <x-sub-header header-title="Contact"></x-sub-header>
    </x-slot>


<x-errors />
    <x-alert message="success"/>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Contact</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.contacts.update', $contact->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                  @include('backend.contacts._form', ['btn' => 'Update'])
                </form>
            </div>
        </div>
    </div>


    @push('extra-js')
        <script>
            $(document).ready(function() {
                // Function to add a new input element with a dropdown button
                var i = 1000;
                function addInput() {
                    var input = '<input type="text" class="form-control" name="mobiles[' + i + '][mobile]" placeholder="Enter your mobile">'
                     + '<input type="hidden" name="mobiles[' + i +'][id]" value="0">';
                    var dropdownButton = '<button class="removeButton">Remove</button>';
                    var inputGroup = '<div class="input-group">' + input + dropdownButton + '</div>';
                    $('#inputContainer').append(inputGroup);
                }

                // Button click event handler
                $('#addButton').on('click', function() {
                    addInput();
                    i++;
                });

                // Remove button click event handler for dynamically added elements
                $(document).on('click', '.removeButton', function() {
                    $(this).parent('.input-group').remove();
                });
            });
        </script>
    @endpush


</x-main-layout>
