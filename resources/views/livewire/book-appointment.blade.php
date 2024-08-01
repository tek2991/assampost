<div>
    <h3 class="section-header">Book Appointment</h3>
    <p class="section-header">For availing Savings Bank services</p>
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
    @if ($success != '')
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <div class="about-img py-3">
        <form wire:submit.prevent="bookAppointment">
            {{-- <div class="row row-cols-2">
                <div class="form-group col-sm col-4 pt-4">
                    <label for="phone">Select service for booking</label>
                    <select class="form-control" wire:model="serviceId">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <div class="row row-cols-2">
                <div class="form-group col-sm pt-4">
                    <label for="existing">Are you an existing Customer? *</label>
                    <select class="form-control" wire:model="isExistingCustomer">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-sm pt-4">
                    <label for="name">Account No *</label>
                    @if ($isExistingCustomer == 1)
                        <input type="text" class="form-control" id="accountNumber" wire:model="accountNumber"
                            style="background-color: #fff">
                    @else
                        <input type="text" class="form-control" id="accountNumber" wire:model="accountNumber"
                            style="background-color: light-gray" disabled>
                    @endif
                </div>
            </div>

            <div class="row row-cols-2">
                <div class="form-group col-sm pt-4">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" wire:model="name"
                        style="background-color: #fff">
                </div>
                <div class="form-group col-sm pt-4">
                    <label for="email">Email (Optional)</label>
                    <input type="email" class="form-control" id="email" wire:model="email"
                        style="background-color: #fff">
                </div>
            </div>
            <div class="row row-cols-2">
                <div class="form-group col-sm col-4 pt-4">
                    <label for="phone">Phone *</label>
                    <input type="text" class="form-control" id="phone" wire:model="phone"
                        style="background-color: #fff">
                </div>
                <div class="form-group col-sm pt-4">
                    @php
                        $min_date = date('Y-m-d');
                        $max_date = date('Y-m-d', strtotime($min_date . ' + 15 days'));
                    @endphp
                    <label for="date">Date *</label>
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
                        @php
                            // Get start time from time, which is in format "10:30 AM to 10:40 AM"
                            $startTime = explode(' ', $slot->time)[0] . ' ' . explode(' ', $slot->time)[1];
                            $startTime = DateTime::createFromFormat('h:i A', $startTime)->format('H:i');
                        @endphp
                        @if ($date == date('Y-m-d') && $startTime < $cutoffTime)
                            <label class="btn btn-secondary col-3" style="cursor: not-allowed;">
                                <input type="radio" value="{{ $slot->id }}" wire:model="timeSlotId"
                                    class="btn-check">
                                {{ $slot->time }}
                            </label>
                        @elseif (in_array($slot->id, $bookedTimeSlotIds))
                            <label class="btn btn-secondary col-3" style="cursor: not-allowed;">
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
