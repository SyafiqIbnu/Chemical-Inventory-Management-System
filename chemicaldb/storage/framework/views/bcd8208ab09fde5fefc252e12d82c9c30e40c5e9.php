namespace App;
use Illuminate\Database\Eloquent\Model;
class <?php echo e($modelName); ?> extends Model
{
	protected $table   = '<?php echo e($table); ?>';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/generator/model.blade.php ENDPATH**/ ?>