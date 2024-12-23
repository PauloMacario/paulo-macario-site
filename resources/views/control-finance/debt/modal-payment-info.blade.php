<div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Informações de pagamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Dia fechamento</th>
                            <th class="text-center">Dia pagamento</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($paymentTypes as $paymentType)
                            <tr>
                                <td class="text-center" style="color:{{ $paymentType->color }};">{{ $paymentType->description }}</td>
                                <td class="text-center">
                                    @if($paymentType->next_processing)
                                        {{ formatDateBR($paymentType->next_processing) }}
                                    @else
                                        Data da compra
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($paymentType->next_payment)
                                        {{ formatDateBR($paymentType->next_payment) }}
                                    @else
                                        Data da compra
                                    @endif                                    
                                </td>
                            </tr>       
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn bg-olive btn-xs" data-dismiss="modal">Close</button>                
            </div>
        </div>      
    </div>    
</div>