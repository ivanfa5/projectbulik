<?php

namespace App\Http\Livewire;

use App\Models\Perkiraan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PerkiraanTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Perkiraan>
    */
    public function datasource(): Builder
    {
        return Perkiraan::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            // ->addColumn('id')
            ->addColumn('kodeperkiraan')

           /** Example of custom column using a closure **/
            // ->addColumn('kodeperkiraan_lower', function (Perkiraan $model) {
            //     return strtolower(e($model->kodeperkiraan));
            // })

            ->addColumn('namaperkiraan')
            ->addColumn('jenisperkiraan');
            // ->addColumn('jenisperkiraan', function (Perkiraan $perkiraan) {
            //     return \App\Enums\Perkiraan::from($perkiraan->jenisperkiraan)->labels();
            // });
            // ->addColumn('created_at_formatted', fn (Perkiraan $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at_formatted', fn (Perkiraan $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            // Column::make('ID', 'id')
            //     ->makeInputRange(),

            Column::make('KODE PERKIRAAN', 'kodeperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(auth()->user()->role == 'admin'),

            Column::make('NAMA PERKIRAAN', 'namaperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(auth()->user()->role == 'admin'),

            Column::make('JENIS PERKIRAAN', 'jenisperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputEnumSelect(\App\Enums\Perkiraan::cases(), 'jenisperkiraan')
                ->editOnClick(auth()->user()->role == 'admin'),

            // Column::make('CREATED AT', 'created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Perkiraan Action Buttons.
     *
     * @return array<int, Button>
     */

     public function actions(): array
     {
         return [
            //  Button::add('edit')
            //      ->caption(__('<svg width="15" height="15">
            //      <use xlink:href="./icons/tabler-sprite.svg#tabler-edit" />
            //    </svg>'))
            //      ->class('btn btn-primary')
            //      ->route('EditKodeperkiraan', ['dataperkiraan' => 'id']),
 
             Button::add('destroy')
                 ->caption(__('<svg width="15" height="15">
                 <use xlink:href="./icons/tabler-sprite.svg#tabler-trash" />
               </svg>'))
                 ->class('btn btn-danger')
                 ->route('DestroyKodeperkiraan', ['dataperkiraan' => 'id'])
                ->method('delete')
                ->target('_self'),
         ];
     }

    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Perkiraan Action Rules.
     *
     * @return array<int, RuleActions>
     */

    
    public function actionRules(): array
    {
       return [

        //Hide edit & delete button if not admin. 
        Rule::button('edit')
            ->when(fn() => auth()->user()->role == 'user')
            ->hide(),
        
        Rule::button('destroy')
            ->when(fn() => auth()->user()->role == 'user')
            ->hide(),
           //Hide button edit for ID 1
            // Rule::button('edit')
            //     ->when(fn($perkiraan) => $perkiraan->id === 1)
            //     ->hide(),
        ];
    }
    
    // EDITONCLICK
    public bool $showErrorBag = true;

    public array $kodeperkiraan;
    public array $namaperkiraan;
    public array $jenisperkiraan;

    protected array $rules = [
        'kodeperkiraan.*' => ['required', 'min:3', 'max:3'],
        'namaperkiraan.*' => ['required'],
        'jenisperkiraan.*' => ['required'],
   ];

    public function onUpdatedEditable($id, $field, $value): void
    {   
        $this->validate();
        Perkiraan::query()->find($id)->update([
            $field => $value,
        ]);
    }
}
