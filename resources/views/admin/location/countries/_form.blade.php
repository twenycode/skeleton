
<div class="mb-3">
    <x-label for="Name" star="true"/>
    <x-input name="name" required :value="$country->name" />
    <x-input name="id" required :value="$country->id" readonly hidden/>
    <x-error field="name" />
</div>
<div class="mb-3">
    <x-label for="Acronym" />
    <x-input name="iso" :value="$country->iso"  placeholder="USA, JPN, KNY"/>
    <x-error field="iso" />
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <x-label for="currency code" />
        <x-input name="currency_code" :value="$country->currency_code"  placeholder="USD, GBP, TZS"/>
        <x-error field="currency_code" />
    </div>
    <div class="col-md-6">
        <x-label for="phone code" />
        <x-input name="phone_code"  :value="$country->phone_code"  placeholder="+255, +254, 253, +1"/>
        <x-error field="phone_code" />
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <x-label for="latitude" />
        <x-input name="latitude" :value="$country->latitude" />
        <x-error field="latitude" />
    </div>
    <div class="col-md-6">
        <x-label for="longitude" />
        <x-input name="longitude"  :value="$country->longitude"  />
        <x-error field="longitude" />
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <x-nav-link href="{{route('admin.countries.index')}}" label="Return" class="btn btn-warning"/>
    </div>
    <div class="col-md-6 text-end">
        <x-button class="btn btn-danger" label="{{$buttonText ?? 'Submit' }}" />
    </div>
</div>
