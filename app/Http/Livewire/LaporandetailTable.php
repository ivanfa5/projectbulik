<?php

namespace App\Http\Livewire;

use App\Models\Laporandetail;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class LaporandetailTable extends PowerGridComponent
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
                ->showRecordCount('short'),
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
    * @return Builder<\App\Models\Laporandetail>
    */
    public function datasource(): Builder
    {
        return Laporandetail::query();
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
            ->addColumn('id')
            ->addColumn('kodetransaksi')

           /** Example of custom column using a closure **/
            ->addColumn('kodetransaksi_lower', function (Laporandetail $model) {
                return strtolower(e($model->kodetransaksi));
            })

            ->addColumn('tanggaltransaksi_formatted', fn (Laporandetail $model) => Carbon::parse($model->tanggaltransaksi)->format('d/m/Y'))
            ->addColumn('kdperkiraan')
            ->addColumn('keterangan')
            ->addColumn('transaksidebit')
            ->addColumn('RPtransaksidebit', fn (Laporandetail $model) =>'Rp ' . number_format(e($model->transaksidebit), 0, ',', '.'))
            ->addColumn('transaksikredit')
            ->addColumn('RPtransaksikredit', fn (Laporandetail $model) =>'Rp ' . number_format(e($model->transaksikredit), 0, ',', '.'));
            // ->addColumn('created_at_formatted', fn (Laporandetail $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            // ->addColumn('updated_at_formatted', fn (Laporandetail $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
                ->makeInputDatePicker('tanggaltransaksi'),

            Column::make('KODE PERKIRAAN', 'kdperkiraan')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('KETERANGAN', 'keterangan')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('DEBIT', 'RPtransaksidebit', 'transaksidebit')
                ->makeInputRange()
                ->withSum('Total Rp', true, true),

            Column::make('KREDIT', 'RPtransaksikredit','transaksikredit')
                ->makeInputRange()
                ->withSum('Total Rp', true, true),

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
     * PowerGrid Laporandetail Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('laporandetail.edit', ['laporandetail' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('laporandetail.destroy', ['laporandetail' => 'id'])
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
     * PowerGrid Laporandetail Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($laporandetail) => $laporandetail->id === 1)
                ->hide(),
        ];
    }
    */
}
