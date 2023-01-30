<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class TransaksiTable extends PowerGridComponent
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
            Header::make()->showSearchInput(),
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
    * @return Builder<\App\Models\Transaksi>
    */
    public function datasource(): Builder
    {
        return Transaksi::query();
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
            ->addColumn('kodetransaksi')

           /** Example of custom column using a closure **/
            ->addColumn('kodetransaksi_lower', function (Transaksi $model) {
                return strtolower(e($model->kodetransaksi));
            })

            ->addColumn('tanggaltransaksi_formatted', fn (Transaksi $model) => Carbon::parse($model->tanggaltransaksi)->format('d/m/Y'))
            ->addColumn('kdperkiraan')
            ->addColumn('keterangan')
            ->addColumn('transaksidebit')
            ->addColumn('transaksikredit');
            // ->addColumn('created_at_formatted', fn (Transaksi $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at_formatted', fn (Transaksi $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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

            Column::make('KODE TRANSAKSI', 'kodetransaksi')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TANGGAL TRANSAKSI', 'tanggaltransaksi_formatted', 'tanggaltransaksi')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('PERKIRAAN', 'kdperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('KETERANGAN', 'keterangan')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(auth()->user()->role == 'admin'),

            Column::make('DEBIT', 'transaksidebit')
                ->makeInputRange(),

            Column::make('KREDIT', 'transaksikredit')
                ->makeInputRange(),

            // Column::make('CREATED AT', 'created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Transaksi Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
                ->caption(__('<svg width="15" height="15">
                            <use xlink:href="./icons/tabler-sprite.svg#tabler-edit" />
                        </svg>'))
                ->class('btn btn-primary')
               ->route('EditTransaksi', ['datatransaksi' => 'id'])
               ->target('_self'),

           Button::make('destroy', 'Delete')
                ->caption(__('<svg width="15" height="15">
                            <use xlink:href="./icons/tabler-sprite.svg#tabler-trash" />
                        </svg>'))
                ->class('btn btn-danger')
               ->route('DestroyTransaksi', ['datatransaksi' => 'id'])
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
     * PowerGrid Transaksi Action Rules.
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
 
     public array $keterangan;
 
     protected array $rules = [
         'keterangan.*' => ['required'],
    ];
 
     public function onUpdatedEditable($id, $field, $value): void
     {   
         $this->validate();
         Transaksi::query()->find($id)->update([
             $field => $value,
         ]);
     }
}
