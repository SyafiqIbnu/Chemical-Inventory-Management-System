
<table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Dokumen</td>
                    <td>Tindakan</td>
                </tr>
               
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $document_types_id_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($document->getDocumentType->name); ?></td>
                            <td><a title='Padam' data-modal data-route="<?php echo route('activity_document_type.destroy',[$document->getKey()]); ?>"
                                    data-toggle='modal' data-target='#modal-delete' 
                                    type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
                            </a></td>
                        </tr>
                       
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $bil++; ?>
                <?php echo Form::open(['route'=>'activity_document_type.store','id'=>'myAppForm']); ?>

                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <?php echo Form::hidden('activity_type_id',$modelActitivyType->id); ?>

                            <?php echo Form::hidden('sort',$bil); ?>

                            <td><?php echo Form::select('document_type_id',$document_types,null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'document_type_id','name'=>'document_type_id']); ?></td>
                            <td><?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.add').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?></td>
                        </tr>
                <?php echo Form::close(); ?>

                </tbody>
            </table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/actitivy_type/documenttype_list.blade.php ENDPATH**/ ?>