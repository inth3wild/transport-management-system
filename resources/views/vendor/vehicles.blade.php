@extends('layouts.vendor')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-light shadow-primary border-radius-lg pt-4 pb-3 d-flex p-4">
                    <h6 class="text-capitalize w-100">Vehicles</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    @if (count($vehicles) > 0)
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vehicle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plate number</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of seats</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Depature time</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Destination</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver</th>
                                <th class="text-primary text-center text-uppercase text-xxs font-weight-bolder opacity-7">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$vehicle->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$vehicle->model}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$vehicle->plate_number}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$vehicle->no_of_seats}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$vehicle->depature_time}}</p>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$vehicle->destination->name}}</h6>
                                        <p class="text-xs font-weight-bold mb-0">{{$vehicle->destination->amount}}</p>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$vehicle->driver->full_name}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="" class="text-secondary font-weight-bold text-xs editVehicleBtn" data-toggle="modal" data-target="#editVehicleModal" data-id="{{$vehicle->id}}">
                                    <i class="material-icons opacity-10 text-info">edit</i>
                                    </a>
                                    <a href="" class="text-secondary font-weight-bold text-xs deleteVehicleBtn" data-toggle="modal" data-target="#deleteVehicleModal" data-id="{{$vehicle->id}}">
                                    <i class="material-icons opacity-10 text-danger">delete</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    @else
                        <div class="text-center">No vehicle found!</div>
                    @endif
                    
                </div>
              </div>
            </div>
        <div class="col-md-4">
            
            <div class="card">
                
                <div class="card-body">
                    <h4 class="dispay-4 text-primary">Create New Vehicle</h4>

                  {!! Form::open(['action' => 'App\Http\Controllers\VehiclesController@store', 'method' => 'POST', 'id' => 'newVehicleForm']) !!}
                    {{-- Vehicle names list --}}
                    <label class="control-label">Name</label>
                    <select name="name" id="make" class="form-control border ps-2">
                      <option value="0">Choose name first</option>
                      <option value="Ford - ({{$first_name}})">Ford - ({{$first_name}})</option>
                      <option value="Toyota - ({{$first_name}})">Toyota - ({{$first_name}})</option>
                      <option value="Suzuki - ({{$first_name}})">Suzuki - ({{$first_name}})</option>
                      <option value="Nissan - ({{$first_name}})">Nissan - ({{$first_name}})</option>
                      <option value="Isuzu - ({{$first_name}})">Isuzu - ({{$first_name}})</option>
                    </select>
                    
                    {{-- Vehicle models List --}}
                    <label class="control-label">Model</label>
                    <select name="model" id="model" class="form-control border ps-2" required>
                      <option value="Courier" data-make="Ford - ({{$first_name}})">Courier</option>
                      <option value="Falcon" data-make="Ford - ({{$first_name}})">Falcon</option>
                      <option value="Festiva" data-make="Ford - ({{$first_name}})">Festiva</option>
                      <option value="Fiesta" data-make="Ford - ({{$first_name}})">Fiesta</option>
                      <option value="Focus" data-make="Ford - ({{$first_name}})">Focus</option>
                      <option value="Laser" data-make="Ford - ({{$first_name}})">Laser</option>
                      <option value="Hiace" data-make="Toyota - ({{$first_name}})">Hiace</option>
                      <option value="Corolla" data-make="Toyota - ({{$first_name}})">Corolla</option>
                      <option value="Avalon" data-make="Toyota - ({{$first_name}})">Avalon</option>
                      <option value="RAV4" data-make="Toyota - ({{$first_name}})">RAV4</option>
                      <option value="Forenza" data-make="Suzuki - ({{$first_name}})">Forenza</option>
                      <option value="Every" data-make="Suzuki - ({{$first_name}})">Every</option>
                      <option value="Reno" data-make="Suzuki - ({{$first_name}})">Reno</option>
                      <option value="Vitara" data-make="Suzuki - ({{$first_name}})">Vitara</option>
                      <option value="Verona" data-make="Suzuki - ({{$first_name}})">Verona</option>
                      <option value="Urvan" data-make="Nissan - ({{$first_name}})">Urvan</option>
                      <option value="Vanatte" data-make="Nissan - ({{$first_name}})">Vanatte</option>
                      <option value="Caravan" data-make="Nissan - ({{$first_name}})">Caravan</option>
                      <option value="Oasis" data-make="Isuzu - ({{$first_name}})">Oasis</option>
                      <option value="i-280" data-make="Isuzu - ({{$first_name}})">i-280</option>
                      <option value="Elf" data-make="Isuzu - ({{$first_name}})">Elf</option>
                      <option value="Rodeo" data-make="Isuzu - ({{$first_name}})">Rodeo</option>
                    </select>
                    <div class="form-group">
                        {{Form::label('plate_number', 'Plate number', ['class' => 'control-label'])}}
                        {{Form::text('plate_number', '', ['class' => 'form-control border ps-2', 'required'])}}
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('seats', 'Number of Seats', ['class' => 'form-label'])}}
                                {{Form::number('seats', '', ['class' => 'form-control border ps-2', 'required', 'min' => '14', 'max' => '25'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('depature_time', 'Depature time', ['class' => 'form-label'])}}
                                {{Form::time('depature_time', '', ['class' => 'form-control border ps-2', 'required', 'min' => '14', 'max' => '25'])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('driver', 'Driver', ['class' => 'control-label'])}}
                        {{Form::select('driver', $drivers, null, ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('destination_id', 'Destination', ['class' => 'control-label'])}}
                        {{Form::select('destination_id', $destinations, null, ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                      {{Form::submit('Add Vehicle', ['class' => 'btn btn-sm btn-outline-success'])}}
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Vehicle Modal-->
<div class="modal fade" id="editVehicleModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-primary">Edit Vehicle</h4>
            <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
            </a>
        </div>
        <div class="modal-body" id="editVehicleModalBody">
        
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="$('#editVehicleForm').submit()"> Save</button>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<!-- Delete Vehicle Modal-->
<div class="modal fade" id="deleteVehicleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-secondary">Confirm delete vehicle!</h4>
                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                </a>
            </div>
            <div class="modal-body" id="deleteVehicleModalBody">
              
            </div>
            <div class="modal-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <button class="btn btn-sm btn-danger" onclick="$('#deleteVehicleForm').submit()"> Yes</button>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
