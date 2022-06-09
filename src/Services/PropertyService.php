<?PHP

namespace ConfrariaWeb\Property\Services;

use ConfrariaWeb\Location\Services\AddressService;
use ConfrariaWeb\Property\Models\Property;
use Illuminate\Support\Str;

class PropertyService{

    private $addressService;

    public function __construct(
        AddressService $addressService
    )
    {
        $this->addressService = $addressService;
    }

    public function paginate($take = 15){
        return Property::paginate($take);
    }

    public function find($id){
        return Property::find($id);
    }

    public function create(array $data)
    {

        /* Title */
        if(!isset($data['title'])){
            $data['title'] = 'Propriedade ' . $data['code'] . ' cadastrada';
        }

        /* Slug */
        if(!isset($data['slug'])){
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $data['featured'] = $data['featured']?? false;

        $property = Property::create($data);
        $addressData = $this->addressService->prepareData($data['localization']);
        $property->addresses()->create($addressData);
        $this->upload($property, $data);
        return $property;
    }

    public function update($data, $id)
    {
        $property = Property::update($data, $id);
        $this->upload($property, $data);
        return $property;
    }

    public function upload($property, $data)
    {
        if(isset($data['files']) && !$property->get('error')){
            $files = [];
            $p = $property->get('obj');
            foreach($data['files'] as $file){
                $files[] = resolve('FileService')->upload($file, [
                    'path' => 'property/properties/files/' . $p->id,
                ]);
            }
            $p->files()->createMany($files);
        }
    }

}