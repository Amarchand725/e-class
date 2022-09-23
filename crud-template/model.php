namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {modelName} extends Model
{
    use SoftDeletes;

    protected $table = '{tableName}';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    {rules}
		];
		return $rules;
    }
}
