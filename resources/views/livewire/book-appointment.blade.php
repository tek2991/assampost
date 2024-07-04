<div>
    <h3 class="section-header">Book Appointment</h3>
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
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="about-img py-3">
        <form wire:submit.prevent="bookAppointment">
            <div class="row row-cols-2">
                <div class="form-group col-sm col-4 pt-4">
                    <label for="phone">Select service for booking</label>
                    <select class="form-control" wire:model="serviceId">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row row-cols-2">
                <div class="form-group col-sm pt-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name"
                        style="background-color: #fff">
                </div>
                <div class="form-group col-sm pt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email"
                        style="background-color: #fff">
                </div>
            </div>
            <div class="row row-cols-2">
                <div class="form-group col-sm col-4 pt-4">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" wire:model="phone"
                        style="background-color: #fff">
                </div>
                <div class="form-group col-sm pt-4">
                    @php
                        $min_date = date('Y-m-d');
                        $max_date = date('Y-m-d', strtotime($min_date . ' + 15 days'));
                    @endphp
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" required format="yyyy-mm-dd"
                        wire:model="date" min="{{ $min_date }}" max="{{ $max_date }}"
                        style="background-color: #fff">
                </div>
            </div>

            {{-- Generate Radio toggle buttons for time slots --}}
            <div class="form-group col-sm pt-4">
                <label for="time">Select time for booking</label>
                <div class="btn-group btn-group-toggle row row-cols-6" data-toggle="buttons">
                    @foreach ($timeSlots as $slot)
                        @if (in_array($slot->id, $bookedTimeSlotIds))
                            <label
                                class="btn btn-secondary col-3" style="cursor: not-allowed;">
                                <input type="radio" value="{{ $slot->id }}" wire:model="timeSlotId"
                                    class="btn-check">
                                {{ $slot->time }}
                            </label>    
                        @else
                            <label
                                class="btn {{ $timeSlotId == $slot->id ? 'btn-success' : 'btn-outline-success' }} col-3">
                                <input type="radio" value="{{ $slot->id }}" wire:model="timeSlotId"
                                    class="btn-check">
                                {{ $slot->time }}
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="form-group pt-4">
                <button type="submit" class="btn btn-success">Book Appointment</button>
            </div>
        </form>
    </div>
</div>
