<div>
    <h3 class="section-header">Search Appointment</h3>

    <div class="about-img py-3">
        <form wire:submit.prevent="searchAppointment">
            <div class="row row-cols-2">
                <div class="form-group col-sm col-4 pt-4">
                    <label for="searchField">Appointment ID or Phone Number</label>
                    <input type="text" class="form-control" id="searchField" wire:model="searchField"
                        style="background-color: #fff">
                </div>
                <div></div>
            </div>
            {{-- Submit Button --}}
            <div class="form-group pt-4">
                <button type="submit" class="btn btn-success">Search Appointment</button>
            </div>
        </form>
    </div>

    {{-- If the search result is not empty list the appointements --}}
    @if (count($appointments) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ Str::mask($appointment->name, '*', 3, 3); }}</td>
                            <td>{{ Str::mask($appointment->phone, '*', 3, 5) }}</td>
                            <td>{{ Str::mask($appointment->email, '*', 3, 5) }}</td>
                            <td>{{ $appointment->date->format('d-M-Y') }} {{ $appointment->timeSlot->time }}</td>
                            <td>{{ $appointment->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        @if ($searched)
            <div class="alert alert-info" role="alert">
                No Appointment Found
            </div>
        @endif
    @endif
</div>
