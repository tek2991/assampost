<div>
    {{-- If errors has odject show them --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- If success message has object show it --}}
    @if ($success !== '')
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <h3 class="section-header">Update Appointment</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Service</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $appointment->date->format('d-M-Y') }} {{ $appointment->timeSlot->time }}</td>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->counterService->name }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->phone }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- If success message has object show it --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($can_update)
        <div class="about-img py-3">
            <form wire:submit.prevent="updateAppointment">
                <div class="form-group col-sm pt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="confirm" name="confirmation"
                            wire:model="status" value="confirm">
                        <label class="form-check-label" for="confirm">
                            Confirm
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="cancel" name="confirmation"
                            wire:model="status" value="cancel">
                        <label class="form-check-label" for="cancel">
                            Cancel
                        </label>
                    </div>
                </div>

                {{-- Confirm checkbox --}}
                <div class="form-group col-sm pt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="confirm"
                            wire:model="confirmed">
                        <label class="form-check-label" for="confirm">
                            Confimation
                        </label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group pt-4">
                    <button type="submit" class="btn btn-success">Update Appointment</button>
                </div>
            </form>
        </div>
    @endif
</div>
