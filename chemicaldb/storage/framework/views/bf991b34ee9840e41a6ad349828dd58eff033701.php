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
                      <?php $i=0;  ?>
                      <?php $__currentLoopData = $bookingVehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingVehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $i++;  ?>
                            <tr>
                                <td><?php echo e($i); ?></td>
                                <td><?php echo $bookingVehicle->vehicleType->name; ?></td>
                                <td><?php echo $bookingVehicle->cost; ?></td>
                                <td>
                                    <?php echo Form::open(['route' => ['booking_vehicle.destroy', $bookingVehicle->id], 'method' => 'delete']); ?>

                                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php echo Form::open(['route' => ['booking_vehicle.store']]); ?>

                            <tr>
                              <td></td>
                              <?php echo Form::hidden('booking_id',$modelBooking->id); ?>

                              <td><?php echo Form::select('vehicle_type_id', $vehicle_types, ['class' => 'form-control']); ?></td>
                              <td><?php echo Form::number('cost', null, ['class' => 'form-control']); ?> </td>
                              <td><?php echo Form::submit('Add', ['class' => 'btn btn-primary']); ?></td>
                            </tr>
                        <?php echo Form::close(); ?>

                      </tbody>
                    </table>
</div>


<?php /**PATH C:\wamp64\www\factohub\resources\views/booking_vehicle/table.blade.php ENDPATH**/ ?>