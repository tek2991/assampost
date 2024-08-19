<div>
    <h3 class="section-header">Manage Appointment</h3>
    {{-- Date Filter --}}
    <div class="form-group row row-cols-2 py-3">
        <div class="form-group col-sm pt-4">
            <label for="date">Select Date</label>
            <input type="date" class="form-control" id="date" wire:model="date">
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">ID</th>
                    <th scope="col">AC No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeSlots as $slot)
                    @php
                        $hasAppointment = in_array($slot->id, $appointmentTimeslotIds);
                    @endphp
                    @if ($hasAppointment)
                        @php
                            $appointment = $appointments->where('time_slot_id', $slot->id)->first();
                        @endphp
                        <tr>
                            <td>{{ $appointment->date->format('d-M-Y') }} {{ $appointment->timeSlot->time }}</td>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->is_existing_customer ? $appointment->account_number : 'New Cust' }}
                            </td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>
                                {{ $appointment->status }}
                                @if ($appointment->status == 'cancel')
                                    <br>
                                        ({{ $appointment->cancellation_reason }})
                                    <br>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('update-appointment', $appointment->id) }}"
                                    class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @else
                        {{-- <tr>
                            <td>{{ $date }} {{ $slot->time }}</td>
                            <td colspan="6" class="text-center">No Appointments</td>
                        </tr> --}}
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
