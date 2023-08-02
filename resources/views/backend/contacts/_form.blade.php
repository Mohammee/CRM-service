<div class="card-body">

    <x-form.group>
        <x-form.label id="name" label="Name" />
        <x-form.input name="name" id="name" value="{{ old('name', $contact->name) }}" />
    </x-form.group>


    <x-form.group>
        <x-form.label id="email" label="Email" />
        <x-form.input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" />
    </x-form.group>


    <div id="inputContainer">
        <label for="">Mobile Number</label>

        @foreach(old('mobiles', $contact->mobiles) as $key => $mobile)
            <div class="input-group">
                <input type="hidden" name="mobiles[mob_{{ $key }}][id]" value="{{ $mobile['id'] ?? 0 }}">
                <input type="text" class="form-control" name="mobiles[mob_{{ $key }}][mobile]" placeholder="Enter your mobile" value="{{ $mobile['mobile'] }}">
                <button class="removeButton">Remove</button>
            </div>
        @endforeach
        <!-- Existing input elements will be added here -->
    </div>
    <button id="addButton" type="button" class="but btn-info">Add new mobile</button>

    <x-form.group>
        <x-form.label id="job" label="Job Name" />
        <x-form.input name="job" id="job" value="{{ old('job', $contact->job) }}" />
    </x-form.group>


    <div class="form-group">
        <x-form.label label="Description" id="description" />
        <x-form.text-area id="description" name="description" :value="old('description', $contact->description)"/>
    </div>

    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            @if(isset($contact->avatar))
                <div class="input-group-append">
                    <img src="{{ $contact->avatar_url }}" alt="" style="width: 80px; object-fit: cover;" class="w-20">
                </div>
            @endif
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $btn }}</button>
</div>
