namespace App;
use Illuminate\Database\Eloquent\Model;
class <?php echo e($modelName); ?> extends Model
{
	protected $table   = '<?php echo e($table); ?>';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}<?php /**PATH C:\wamp64\www\permitkhas\resources\views/generator/model.blade.php ENDPATH**/ ?>