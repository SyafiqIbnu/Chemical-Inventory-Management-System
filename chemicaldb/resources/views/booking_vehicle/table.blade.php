<div class="table-responsive">

<table class="table table-bordered table-hover">
                      <thead bgcolor="#E8EBE8">
                        <tr>
                          <th>No.</th>
                          <th>Vehicle Type</th>
                          <th>Cost (RM)</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $i=0;  @endphp
                      @foreach($bookingVehicles as $bookingVehicle)
                      @php $i++;  @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $bookingVehicle->vehicleType->name !!}</td>
                                <td>{!! $bookingVehicle->cost !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['booking_vehicle.destroy', $bookingVehicle->id], 'method' => 'delete']) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        {!! Form::open(['route' => ['booking_vehicle.store']]) !!}
                            <tr>
                              <td></td>
                              {!! Form::hidden('booking_id',$modelBooking->id) !!}
                              <td>{!! Form::select('vehicle_type_id', $vehicle_types, ['class' => 'form-control']) !!}</td>
                              <td>{!! Form::number('cost', null, ['class' => 'form-control']) !!} </td>
                              <td>{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}</td>
                            </tr>
                        {!! Form::close() !!}
                      </tbody>
                    </table>
</div>


