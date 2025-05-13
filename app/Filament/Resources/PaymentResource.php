<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    
    protected static ?string $navigationGroup = 'Finance';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('booking_id')
                    ->relationship('booking', 'id')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->prefix('Rp')
                    ->numeric()
                    ->mask('999,999,999.99')
                    ->maxValue(999999999.99),
                Forms\Components\Select::make('payment_method')
                    ->options([
                        'qris' => 'QRIS',
                        'bank_transfer' => 'Bank Transfer',
                        'credit_card' => 'Credit Card',
                        'cash' => 'Cash'
                    ])
                    ->default('qris')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processed' => 'Processed',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected'
                    ])
                    ->default('pending')
                    ->required(),
                Forms\Components\DateTimePicker::make('paid_at')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processed',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processed' => 'Processed',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected'
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Payment')
                    ->modalDescription('Update payment information below')
                    ->modalSubmitActionLabel('Save changes')
                    ->successNotificationTitle('Payment updated successfully')
                    ->using(function (Payment $record, array $data): Payment {
                        $record->update($data);
                        
                        // Update booking status based on payment status
                        if ($data['status'] === 'approved') {
                            $booking = Booking::find($record->booking_id);
                            if ($booking) {
                                $booking->update(['status' => 'completed']);
                            }
                        } elseif ($data['status'] === 'rejected') {
                            $booking = Booking::find($record->booking_id);
                            if ($booking) {
                                $booking->update(['status' => 'cancelled']);
                            }
                        }
                        
                        return $record;
                    }),
                Tables\Actions\ViewAction::make()
                    ->modalHeading('View Payment Details'),
                Tables\Actions\Action::make('updateStatus')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processed' => 'Processed',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected'
                            ])
                            ->required(),
                    ])
                    ->action(function (Payment $record, array $data): void {
                        $record->update([
                            'status' => $data['status'],
                        ]);
                        
                        // Update booking status based on payment status
                        if ($data['status'] === 'approved') {
                            $booking = Booking::find($record->booking_id);
                            if ($booking) {
                                $booking->update(['status' => 'completed']);
                            }
                        } elseif ($data['status'] === 'rejected') {
                            $booking = Booking::find($record->booking_id);
                            if ($booking) {
                                $booking->update(['status' => 'cancelled']);
                            }
                        }
                    })
                    ->successNotificationTitle('Payment status updated'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('updateStatus')
                        ->icon('heroicon-o-arrow-path')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->options([
                                    'pending' => 'Pending',
                                    'processed' => 'Processed',
                                    'approved' => 'Approved',
                                    'rejected' => 'Rejected'
                                ])
                                ->required(),
                        ])
                        ->action(function ($records, array $data): void {
                            foreach ($records as $record) {
                                $record->update(['status' => $data['status']]);
                                
                                // Update booking status based on payment status
                                if ($data['status'] === 'approved') {
                                    $booking = Booking::find($record->booking_id);
                                    if ($booking) {
                                        $booking->update(['status' => 'completed']);
                                    }
                                } elseif ($data['status'] === 'rejected') {
                                    $booking = Booking::find($record->booking_id);
                                    if ($booking) {
                                        $booking->update(['status' => 'cancelled']);
                                    }
                                }
                            }
                        })
                        ->successNotificationTitle('Payments status updated'),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}