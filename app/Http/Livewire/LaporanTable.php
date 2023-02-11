<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class LaporanTable extends PowerGridComponent
{
    use ActionButton;
    public string $sortField = 'kdperkiraan';

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
            // ->addColumn('kodetransaksi_lower', function (Transaksi $model) {
            //     return strtolower(e($model->kodetransaksi));
            // })

            ->addColumn('tanggaltransaksi_formatted', fn (Transaksi $model) => Carbon::parse($model->tanggaltransaksi)->format('d/m/Y'))
            ->addColumn('kdperkiraan')
            ->addColumn('keterangan')
            ->addColumn('transaksidebit')
            // ->addColumn('transaksidebit', function (Transaksi $datatransaksi) {
            //     $debit = $datatransaksi->transaksidebit;

            //     return 'Rp ' . number_format(e($debit), 2, ',', '.'); //R$ 1.000,00
            // })
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

            Column::make('KODETRANSAKSI', 'kodetransaksi')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TANGGALTRANSAKSI', 'tanggaltransaksi_formatted', 'tanggaltransaksi')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('KDPERKIRAAN', 'kdperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('KETERANGAN', 'keterangan')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TRANSAKSIDEBIT', 'transaksidebit')
                ->makeInputRange()
                ->withSum('Sum', true, true),

            Column::make('TRANSAKSIKREDIT', 'transaksikredit')
                ->makeInputRange()
                ->withSum('Sum', true, true),

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

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('transaksi.edit', ['transaksi' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('transaksi.destroy', ['transaksi' => 'id'])
               ->method('delete')
        ];
    }
    */

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

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($transaksi) => $transaksi->id === 1)
                ->hide(),
        ];
    }
    */
}
