namespace App;
use Illuminate\Database\Eloquent\Model;
class {{$modelName}} extends Model
{
	protected $table   = '{{$table}}';
	protected $guarded =['urlReturn'];
    public $incrementing = false;
}