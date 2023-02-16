namespace App;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class {{$modelName}} extends Model
{
    use Cachable;
	protected $table   = '{{$table}}';
	protected $guarded =['urlReturn'];
        public $incrementing = false;
}