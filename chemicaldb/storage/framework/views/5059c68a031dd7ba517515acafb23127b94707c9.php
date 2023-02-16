<table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Dokumen</td>
                    <td>Lihat Dokumen</td>
                </tr>
                <?php if(!$uploadedMandatoryDocs): ?>
                <tr>
                    <td colspan="4" style="background-color:#F6624B"><b>SILA MUATNAIK SEMUA DOKUMEN MANDATORI SEBELUM HANTAR PERMOHONAN</b></td>
                </tr>
                <?php endif; ?>
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $permitDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($document->permitDocumentType->name); ?></td>
                            <td><a target='_blank' title='Papar' type='button' class='btn btn-xs btn-info' href="<?php echo asset('storage/'.$document->original_name); ?>"><i class='fa fa-file'></i></a></td>
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/maklumat_dokumen.blade.php ENDPATH**/ ?>