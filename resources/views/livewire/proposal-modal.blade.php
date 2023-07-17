<div>
    @if ($isOpen)
        <div class="" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td><img src="{{ asset('img/aunar-logo-3.png') }}" alt="" width="200"></td>
                                <td align="center">CORPORACION UNIVERSITARIA AUTONOMA DE NARIÑO EXTENSIÓN CARTAGENA</td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">PROPUESTA DE GRADO</td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td style="background: #e7e6e6;" colspan="1"><label for="">Título:</label>
                                </td>
                                <td colspan="3">
                                    <p class="modal-title" id="title">{{ $proposal->title }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: #e7e6e6;" colspan="1"><label for="">Línea de
                                        investigación:</label> </td>
                                <td colspan="3">
                                    <p id="linea">{{ $proposal->line }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: #e7e6e6;"><label for="">Programa:</label> </td>
                                <td>
                                    <p id="program">{{ $proposal->program }}</p>
                                </td>
                                <td style="background: #e7e6e6;"><label for="">Semestre:</label> </td>
                                <td align="center">
                                    <p id="semestre">{{ $proposal->semester }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: #e7e6e6;" align="center" colspan="4"><label
                                        for="">Descripción</label></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p style="text-align: justify;" id="descrip" name="description">
                                        {{ $proposal->description }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: #e7e6e6;"><label for="">Nombre del asesor:</label> </td>
                                <td>
                                    <p id="tutor">{{ $proposal->advisor }}</p>
                                </td>
                                <td style="background: #e7e6e6;"><label for="">Nombre del lider:</label> </td>
                                <td>
                                    <p id="lid">{{ $proposal->leader }}</p>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td style="background: #e7e6e6;" colspan="1"><label for="">Número de
                                        integrantes</label></td>
                                <td style="background: #e7e6e6;" align="center" colspan="3"><label
                                        for="">Integrantes</label></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="1">
                                    <p id="num"></p>
                                </td>
                                <td colspan="3">
                                    <ul>
                                        <li id="int1"></li>
                                        <li id="int2"></li>
                                        <li id="int3"></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="buttons">
                        <button type="button" class="button" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
