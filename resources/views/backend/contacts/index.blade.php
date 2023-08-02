<x-main-layout title="Contact Control">


    <x-slot name="header">
        <x-sub-header header-title="Contact"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Control Contacts</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <form class="row my-5">

                        <div class="col-md-3">
                           <x-form.label id="n" label="Name" class="col-form-label" />
                            <x-form.input id="n" name="name" value="{{ request()->query('name') }}" />
                        </div>

                        <div class="col-md-3">
                            <x-form.label id="em" label="Email" class="col-form-label" />
                            <x-form.input id="em" name="email" value="{{ request()->query('email') }}" />
                        </div>

                        <div class="col-md-3">
                            <x-form.label id="or" label="SortBy" class="col-form-label" />
                            <select name="sort_by" id="or" class="form-control">
                                <option value="asc" selected>Ascending</option>
                                <option value="desc" @selected(request()->query('sort_by') == 'desc')>Descending</option>
                            </select>
                        </div>

                        <div class="col-md-3 align-items-center">
                            <label for="" @class(['col-form-label']) style="color: #fff">.</label>
                             <button type="submit" class="btn btn-warning w-100">Search</button>
                        </div>

                    </form>

                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Job</th>
                            <th>Created_at</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                              <td>{{ $contact->id }}</td>
                              <td>
                                  <img src="{{ $contact->avatar_url }}" alt="" style="object-fit: cover; width: 40px">
                              </td>
                              <td>{{ $contact->name }}</td>
                                <td>
                                    <ul>
                                    @foreach($contact->mobiles as $mobile)
                                        <li>{{ $mobile->mobile }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->job }}</td>
                              <td>{{ $contact->created_at->format('Y-m-d g:i a') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-secondary">Edit</a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Data To Show</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>


                    <div class="row justify-content-around align-items-center">
                        {{ $contacts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>



</x-main-layout>
