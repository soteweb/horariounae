<x-filament-panels::page>
<style>
    /* Override Filament page padding for print */
    .fi-page-content { padding: 0 !important; }
    .sm\:fi-page-content { padding: 0 !important; }
    
    /* Hide specific filament navigation elements on print */
    @media print {
        .fi-sidebar, .fi-topbar, .sched-filters-row { display: none !important; }
        .fi-main { padding: 0 !important; margin: 0 !important; }
        .sched-card { box-shadow: none !important; border: none !important; padding: 0 !important; margin: 0 !important; }
        @page { size: A4 landscape; margin: 10mm; }
        body { background: white !important; }
    }

    .sched-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 1px 6px 0 rgba(0,0,0,0.07);
        padding: 24px;
        margin-bottom: 24px;
        color: #000;
        font-family: Arial, sans-serif; /* Excel style */
    }
    .dark .sched-card { background: #18181b; color: #fff; }
    @media print { .dark .sched-card { background: #fff !important; color: #000 !important; } }

    .sched-filters-row {
        display: flex;
        align-items: flex-end;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 24px;
        padding-bottom: 24px;
        border-bottom: 1px dashed #ccc;
    }

    .sched-filter-group { display: flex; flex-direction: column; gap: 4px; min-width: 200px; }
    .sched-filter-group label { font-size: 11px; font-weight: 600; color: #6b7280; }
    .sched-filter-group select {
        border: 1.5px solid #d1d5db; border-radius: 8px; padding: 9px 36px 9px 14px;
        font-size: 14px; color: #111827; background: #fff; width: 100%;
    }
    
    .sched-add-btn {
        display: inline-flex; align-items: center; gap: 8px; background: #f5b82e;
        color: #111827; font-weight: 700; font-size: 14px; border: none; border-radius: 12px;
        padding: 11px 22px; cursor: pointer;
    }

    /* ---------------- HEADER INSTITUCIONAL ---------------- */
    .inst-header {
        text-align: center;
        margin-bottom: 20px;
        font-family: "Times New Roman", Times, serif;
    }
    .inst-header h2 { font-size: 18px; font-weight: bold; margin: 0; line-height: 1.2; }
    .inst-header h3 { font-size: 16px; font-weight: bold; margin: 0; line-height: 1.2; }
    .inst-header h4 { font-size: 14px; font-weight: normal; margin: 5px 0 0 0; }

    .inst-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
        font-size: 11px;
        font-weight: bold;
    }
    .inst-info-table td { padding: 4px 8px; }
    
    /* ---------------- MAIN SCHEDULE GRID ---------------- */
    .inst-grid {
        width: 100%;
        border-collapse: collapse;
        font-size: 11px;
        border: 2px solid #000;
        table-layout: fixed;
    }
    .inst-grid th, .inst-grid td {
        border: 1px solid #000;
        text-align: center;
        vertical-align: middle;
        padding: 4px;
    }
    .inst-grid th {
        font-weight: bold;
        text-transform: uppercase;
        padding: 8px 4px;
    }
    .inst-grid .time-col {
        width: 80px;
        font-weight: normal;
        font-size: 10px;
    }
    
    .cell-wrap { position: relative; width: 100%; height: 100%; min-height: 60px; display: flex; flex-direction: column; justify-content: center; align-items: center;}
    
    /* Colors as requested */
    .bg-green { background-color: #dcedc8 !important; color: #000; } 
    .bg-blue { background-color: #e3f2fd !important; color: #000; } 
    .bg-yellow { background-color: #fff9c4 !important; color: #000; } 
    @media print {
        .bg-green { background-color: #dcedc8 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .bg-blue { background-color: #e3f2fd !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .bg-yellow { background-color: #fff9c4 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }

    .subj-name { font-weight: bold; text-transform: uppercase; font-size: 11px; line-height: 1.2; margin-bottom: 4px; }
    .subj-teacher { font-style: italic; font-size: 10px; line-height: 1.1; margin-bottom: 2px; }
    .subj-room { font-style: italic; font-size: 10px; line-height: 1.1; }

    /* Receso */
    .row-receso td { font-weight: bold; font-size: 11px; padding: 6px; }

    /* Edit Buttons Overlay (Hidden on print) */
    .cell-actions {
        display: none; position: absolute; top: 2px; right: 2px; gap: 4px; z-index: 10;
    }
    .cell-wrap:hover .cell-actions { display: flex; }
    @media print { .cell-actions, .btn-add-cell { display: none !important; } }
    .btn-edit { background: #3b82f6; color: #fff; border: none; padding: 2px 4px; font-size: 9px; cursor: pointer; border-radius: 3px; }
    .btn-del { background: #ef4444; color: #fff; border: none; padding: 2px 4px; font-size: 9px; cursor: pointer; border-radius: 3px; }
    
    .btn-add-cell {
        display: none; position: absolute; inset: 0; background: rgba(0,0,0,0.05); cursor: pointer;
        align-items: center; justify-content: center; border: none; width: 100%; height: 100%; z-index: 5;
    }
    .cell-wrap:hover .btn-add-cell { display: flex; }
    .btn-add-cell:hover { background: rgba(0,0,0,0.1); }
    .has-content:hover .btn-add-cell { display: none; } /* don't show add button if there is content */

    /* ---------------- FOOTER / SUMMARY ---------------- */
    .inst-footer {
        margin-top: 15px;
        display: flex;
        gap: 15px;
        align-items: flex-start;
    }
    .inst-summary {
        flex: 1;
        border-collapse: collapse;
        font-size: 10px;
        border: 2px solid #000;
    }
    .inst-summary th, .inst-summary td {
        border: 1px solid #000;
        padding: 4px;
        text-align: center;
    }
    .inst-summary th { font-weight: bold; }
    .inst-summary td.text-left { text-align: left; padding-left: 8px; }

    .inst-signatures {
        width: 350px;
        font-size: 10px;
    }
    .sig-date {
        border: 1px solid #000;
        text-align: center;
        padding: 4px;
        font-weight: bold;
        margin-bottom: 30px;
        width: 150px;
        margin-left: auto;
    }
    .sig-date-box { border-top: 1px solid #000; height: 15px; margin-top: 5px; }
    .sig-lines {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    .sig-line {
        border-top: 1px solid #000;
        padding-top: 4px;
        text-align: center;
        width: 30%;
    }
</style>

@php
    $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
@endphp

<div class="sched-card">
    <div class="sched-filters-row">
        <div class="sched-filter-group" style="min-width:220px">
            <label>Seleccionar Carrera</label>
            <select wire:model.live="data.career_id">
                <option value="">-- Seleccionar Carrera --</option>
                @foreach(\App\Models\Career::orderBy('name')->get() as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="sched-filter-group" style="min-width:220px">
            <label>Seleccionar Curso / Semestre</label>
            <select wire:model.live="data.course_id">
                <option value="">-- Seleccionar Curso / Semestre --</option>
                @foreach(\App\Models\Course::orderBy('name')->get() as $co)
                    <option value="{{ $co->id }}">{{ $co->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-left:auto; padding-bottom:1px; display:flex; gap:10px;">
            <button type="button" class="sched-add-btn" wire:click="mountAction('createSchedule')">
                Añadir Clase
            </button>
            <button type="button" class="sched-add-btn" style="background:#e5e7eb;" onclick="window.print()">
                🖨️ Imprimir
            </button>
        </div>
    </div>

    @if(empty($this->data['career_id']) || empty($this->data['course_id']))
        <div style="padding: 40px; text-align: center; color: #6b7280;">
            Seleccione una Carrera y Curso para ver el horario en formato institucional.
        </div>
    @else
        @php
            $schedules = $this->getSchedules();
            $career = \App\Models\Career::find($this->data['career_id']);
            $course = \App\Models\Course::find($this->data['course_id']);
            
            // Slots and Receso
            $careerSlots = $this->getCareerSlots(); 
            $allSlots = collect();
            foreach ($careerSlots as $slot) {
                $allSlots->push($slot);
                [, $slotEnd] = explode(' - ', $slot);
                if (\Carbon\Carbon::parse($slotEnd)->format('H:i') === '19:50') {
                    $allSlots->push('__RECESO__');
                }
            }

            // Colors for subjects
            $subjectColors = [];
            $colorClasses = ['bg-green', 'bg-blue', 'bg-yellow'];
            $colorIdx = 0;
            $summaryData = [];

            foreach($schedules as $s) {
                if(!isset($subjectColors[$s->subject_id])) {
                    $subjectColors[$s->subject_id] = $colorClasses[$colorIdx % 3];
                    $colorIdx++;
                    
                    if ($s->subject) {
                        $summaryData[$s->subject_id] = [
                            'faculty' => $s->subject->faculty ?? 'FACAT',
                            'acta' => $s->subject->identifier ?? '-',
                            'name' => $s->subject->name,
                            'hours' => $s->subject->hours ?? 0,
                        ];
                    }
                }
            }
        @endphp

        <!-- INSTITUTIONAL HEADER -->
        <div class="inst-header">
            <h2>UNIVERSIDAD AUTÓNOMA DE ENCARNACIÓN</h2>
            <h3>FACULTAD DE CIENCIA, ARTE Y TECNOLOGÍA</h3>
            <h4>HORARIO DE CLASES</h4>
        </div>

        <table class="inst-info-table">
            <tr>
                <td style="width:50%">CARRERA: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($career->name ?? '') }}</span></td>
                <td style="width:25%">TURNO: <span style="font-weight:normal; font-style:italic;">NOCHE</span></td>
                <td style="width:25%">AÑO: <span style="font-weight:normal; font-style:italic;">{{ date('Y') }}</span></td>
            </tr>
            <tr>
                <td>CURSO: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($course->name ?? '') }}</span></td>
                <td colspan="2">SEMESTRE: <span style="font-weight:normal; font-style:italic;">{{ mb_strtoupper($course->period ?? '') }}</span></td>
            </tr>
        </table>

        <!-- MAIN SCHEDULE GRID -->
        <table class="inst-grid">
            <thead>
                <tr>
                    <th class="time-col">HORARIO</th>
                    @foreach($days as $day)
                        <th>{{ mb_strtoupper($day) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($allSlots as $slot)
                    @if($slot === '__RECESO__')
                        <tr class="row-receso">
                            <td class="time-col">19:50-20:00</td>
                            @foreach($days as $day)
                                <td>RECESO</td>
                            @endforeach
                        </tr>
                    @else
                        @php
                            [$start, $end] = explode(' - ', $slot);
                            $fmt_s = \Carbon\Carbon::parse($start)->format('H:i');
                            $fmt_e = \Carbon\Carbon::parse($end)->format('H:i');
                        @endphp
                        <tr>
                            <td class="time-col">{{ $fmt_s }}-{{ $fmt_e }}</td>
                            @foreach($days as $day)
                                @php
                                    $cells = $schedules->filter(fn($s) =>
                                        strtolower($s->day_of_week) === strtolower($day) && $s->start_time === $start
                                    );
                                @endphp
                                @if($cells->isNotEmpty())
                                    @php
                                        $cs = $cells->first();
                                        $bgColorClass = $subjectColors[$cs->subject_id] ?? '';
                                    @endphp
                                    <td class="{{ $bgColorClass }}">
                                        <div class="cell-wrap has-content">
                                            <div class="subj-name">{{ mb_strtoupper($cs->subject?->name ?? 'MATERIA') }}</div>
                                            <div class="subj-teacher">{{ mb_strtoupper($cs->teacher?->name ?? 'DOCENTE') }}</div>
                                            <div class="subj-room">SALA {{ mb_strtoupper($cs->classroom?->name ?? 'N/A') }}</div>
                                            
                                            <div class="cell-actions">
                                                <button class="btn-edit" title="Editar" wire:click="mountAction('editSchedule', { id: {{ $cs->id }} })">✏️</button>
                                                <button class="btn-del" title="Eliminar" wire:click="mountAction('deleteSchedule', { id: {{ $cs->id }} })">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div class="cell-wrap">
                                            <button title="Añadir Clase" class="btn-add-cell" wire:click="mountAction('createSchedule', { day: '{{ $day }}', start: '{{ $start }}', end: '{{ $end }}' })">✚</button>
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- FOOTER / SUMMARY -->
        <div class="inst-footer">
            <table class="inst-summary">
                <thead>
                    <tr>
                        <th style="width:15%">FACULTAD</th>
                        <th style="width:15%">ACTA</th>
                        <th style="width:45%">Resumen Semanal de Materias</th>
                        <th style="width:10%">T.Horas</th>
                        <th style="width:15%">Observaciones<br><span style="font-size:7px;font-weight:normal">(Consignar clases combinadas)</span></th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $totalHours = 0; 
                        // sort summary by subject name or acta? I will just loop the gathered summary
                    @endphp
                    @foreach($summaryData as $data)
                        @php $totalHours += $data['hours']; @endphp
                        <tr>
                            <td style="font-style:italic;">{{ mb_strtoupper($data['faculty']) }}</td>
                            <td>{{ mb_strtoupper($data['acta']) }}</td>
                            <td class="text-left">{{ mb_convert_case($data['name'], MB_CASE_TITLE, "UTF-8") }}</td>
                            <td>{{ $data['hours'] ?: '-' }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    @if(empty($summaryData))
                        <tr>
                            <td colspan="5" style="padding: 10px; color: #999;">Agregue clases al horario para generar el resumen.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="inst-signatures">
                <div class="sig-date">
                    Fecha de Aprobación:<br>
                    <span style="font-weight:normal;">{{ \App\Models\Setting::where('key', 'approval_date')->value('value') ?? '___/___/2026' }}</span>
                    <div class="sig-date-box"></div>
                </div>
                <div class="sig-lines">
                    <div class="sig-line" style="position: relative;">
                        @php $secSig = \App\Models\Setting::where('key', 'secretary_signature')->value('value'); @endphp
                        @if($secSig)<img src="{{ asset('storage/' . $secSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                        Secretario/a<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'secretary_name')->value('value') ?? 'Lic. Jéssica Ibáñez' }}</span>
                    </div>
                    <div class="sig-line" style="position: relative;">
                        @php $dirSig = \App\Models\Setting::where('key', 'director_signature')->value('value'); @endphp
                        @if($dirSig)<img src="{{ asset('storage/' . $dirSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                        Decano/Director<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'director_name')->value('value') ?? 'Mgtr. Gabriel Sotelo' }}</span>
                    </div>
                    <div class="sig-line" style="position: relative;">
                        @php $acadSig = \App\Models\Setting::where('key', 'academic_director_signature')->value('value'); @endphp
                        @if($acadSig)<img src="{{ asset('storage/' . $acadSig) }}" style="position:absolute; bottom:100%; margin-bottom:-15px; left:50%; transform:translateX(-50%); max-height:60px; max-width:140px; object-fit:contain; z-index:10; mix-blend-mode:multiply;" alt="">@endif
                        Directora Académica General<br><span style="font-size:8px;font-weight:normal;">{{ \App\Models\Setting::where('key', 'academic_director_name')->value('value') ?? 'Dra. Laura Arévalos' }}</span>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>

<x-filament-actions::modals />
</x-filament-panels::page>
