<x-filament-panels::page>
<style>
    .hs-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 1px 6px 0 rgba(0,0,0,0.07);
        border: 1px solid #e9eaec;
        padding: 32px 32px 28px;
        margin-bottom: 24px;
    }
    .dark .hs-card { background: #18181b; border-color: #27272a; }

    .hs-card h1 {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }
    .dark .hs-card h1 { color: #f4f4f5; }

    .hs-subtitle {
        font-size: 11px;
        font-weight: 600;
        color: #9ca3af;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .hs-filters-row {
        display: flex;
        align-items: flex-end;
        gap: 16px;
        flex-wrap: wrap;
    }
    .hs-filter-group {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 200px;
    }
    .hs-filter-group label {
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
    }
    .dark .hs-filter-group label { color: #9ca3af; }
    .hs-filter-group select {
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        padding: 9px 36px 9px 14px;
        font-size: 14px;
        color: #111827;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%236b7280'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z' clip-rule='evenodd' /%3E%3C/svg%3E") no-repeat right 10px center/18px;
        -webkit-appearance: none;
        appearance: none;
        cursor: pointer;
        outline: none;
        transition: border-color .15s;
        width: 100%;
    }
    .dark .hs-filter-group select {
        background-color: #27272a;
        border-color: #3f3f46;
        color: #f4f4f5;
    }
    .hs-filter-group select:focus { border-color: #6366f1; }

    /* Calendar table */
    .hs-table-wrap {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 1px 6px 0 rgba(0,0,0,0.06);
        border: 1px solid #e9eaec;
        overflow: hidden;
    }
    .dark .hs-table-wrap { background: #18181b; border-color: #27272a; }
    .hs-table-scroll { overflow-x: auto; }

    .hs-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }
    .hs-table thead tr {
        background: #f3f4f6;
        border-bottom: 2px solid #e5e7eb;
    }
    .dark .hs-table thead tr { background: #27272a; border-bottom-color: #3f3f46; }

    .hs-table thead th {
        padding: 12px 8px;
        text-align: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #9ca3af;
        border-right: 1px solid #e5e7eb;
    }
    .dark .hs-table thead th { color: #6b7280; border-right-color: #3f3f46; }
    .hs-table thead th.col-lunes   { color: #f59e0b; }
    .hs-table thead th.col-viernes { color: #f59e0b; }
    .hs-table thead th.col-mierc   { color: #6366f1; }

    .hs-table tbody tr { border-bottom: 1px solid #f3f4f6; }
    .dark .hs-table tbody tr { border-bottom-color: #27272a; }

    .hs-table td {
        padding: 8px;
        border-right: 1px solid #f3f4f6;
        vertical-align: top;
    }
    .dark .hs-table td { border-right-color: #27272a; }

    .hs-table td.time-col {
        text-align: center;
        font-weight: 700;
        font-size: 11px;
        color: #6b7280;
        vertical-align: middle;
        min-width: 64px;
        padding: 8px 6px;
        line-height: 1.5;
        white-space: nowrap;
    }

    /* Class card — read only */
    .class-card {
        border-radius: 10px;
        padding: 8px 10px;
        margin-bottom: 4px;
        border-width: 1.5px;
        border-style: solid;
    }
    .class-card:last-child { margin-bottom: 0; }
    .class-card.yellow { background: #fffbeb; border-color: #fcd34d; }
    .class-card.purple { background: #f5f3ff; border-color: #c4b5fd; }
    .class-card.blue   { background: #eff6ff; border-color: #bfdbfe; }
    .dark .class-card.yellow { background: rgba(251,191,36,0.12); border-color: #d97706; }
    .dark .class-card.purple { background: rgba(139,92,246,0.12); border-color: #7c3aed; }
    .dark .class-card.blue   { background: rgba(59,130,246,0.12); border-color: #1d4ed8; }

    .class-card .card-title {
        font-weight: 700;
        font-size: 12px;
        color: #1f2937;
        margin-bottom: 4px;
        line-height: 1.3;
    }
    .dark .class-card .card-title { color: #f3f4f6; }
    .class-card.purple .card-title { color: #5b21b6; }
    .dark .class-card.purple .card-title { color: #c4b5fd; }

    .card-row {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: #4b5563;
        margin-top: 2px;
    }
    .dark .card-row { color: #9ca3af; }
    .card-row svg { width: 12px; height: 12px; opacity: 0.7; flex-shrink: 0; }

    .card-aula {
        font-size: 11px;
        font-weight: 700;
        color: #1e3a8a;
        margin-top: 4px;
    }
    .dark .card-aula { color: #93c5fd; }
    .class-card.purple .card-aula { color: #5b21b6; }
    .dark .class-card.purple .card-aula { color: #c4b5fd; }

    /* Receso row */
    .receso-row td { background: #f9fafb; padding: 10px 8px; }
    .dark .receso-row td { background: #27272a; }
    .receso-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #d97706;
        opacity: 0.7;
    }
    .receso-label svg { width: 14px; height: 14px; }

    /* Empty state */
    .hs-empty {
        padding: 64px 24px;
        text-align: center;
    }
    .hs-empty svg { width: 48px; height: 48px; margin: 0 auto 16px; color: #d1d5db; }
    .hs-empty h3 { font-size: 16px; font-weight: 700; color: #374151; margin: 0 0 8px; }
    .dark .hs-empty h3 { color: #d1d5db; }
    .hs-empty p { font-size: 13px; color: #9ca3af; margin: 0; }
</style>

@php
    $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    $dayColClass = [
        'Lunes'     => 'col-lunes',
        'Martes'    => '',
        'Miércoles' => 'col-mierc',
        'Jueves'    => '',
        'Viernes'   => 'col-viernes',
        'Sábado'    => '',
    ];
@endphp

<!-- ===== TOP CARD ===== -->
<div class="hs-card">
    <h1>Horario Semanal</h1>
    <p class="hs-subtitle">FACULTAD DE CIENCIA, ARTE Y TECNOLOGÍA &mdash; Año: {{ date('Y') }}</p>

    <div class="hs-filters-row">
        <div class="hs-filter-group">
            <label>Carrera</label>
            <select wire:model.live="career_id">
                <option value="">-- Seleccionar Carrera --</option>
                @foreach(\App\Models\Career::orderBy('name')->get() as $career)
                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="hs-filter-group">
            <label>Semestre / Curso</label>
            <select wire:model.live="course_id">
                <option value="">-- Seleccionar Semestre/Curso --</option>
                @foreach(\App\Models\Course::orderBy('name')->get() as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="hs-filter-group" style="justify-content:flex-end; align-self:flex-end;">
            <span style="display:inline-flex;align-items:center;gap:6px;background:#1e293b;color:#f1f5f9;font-size:12px;font-weight:700;padding:8px 14px;border-radius:8px;letter-spacing:0.05em;">
                <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                </svg>
                TURNO NOCHE
            </span>
        </div>
    </div>
</div>

<!-- ===== CALENDAR ===== -->
@php
    $schedules = $this->getSchedules();

    // Bloques dinámicos por carrera (con receso fijo después del slot que termina a las 19:50)
    $careerSlots = $this->getCareerSlots();
    $allSlots = collect();
    foreach ($careerSlots as $slot) {
        $allSlots->push($slot);
        [, $slotEnd] = explode(' - ', $slot);
        if (\Carbon\Carbon::parse($slotEnd)->format('H:i') === '19:50') {
            $allSlots->push('__RECESO__');
        }
    }


    $subjectColors = [];
    $colorOptions  = ['yellow','purple','blue'];
    $colorIdx = 0;
    foreach ($schedules as $s) {
        if (!isset($subjectColors[$s->subject_id])) {
            $subjectColors[$s->subject_id] = $colorOptions[$colorIdx % 3];
            $colorIdx++;
        }
    }
@endphp

<div class="hs-table-wrap">
    @if(empty($this->career_id) && empty($this->course_id))
        <div class="hs-empty">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3>Seleccione los filtros</h3>
            <p>Elige la Carrera y el Curso para visualizar el horario. (Turno: Noche)</p>
        </div>
    @else
        <div class="hs-table-scroll">
            <table class="hs-table">
                <thead>
                    <tr>
                        <th style="width:72px">HORARIO</th>
                        @foreach($days as $day)
                            <th class="{{ $dayColClass[$day] ?? '' }}">{{ strtoupper($day) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($allSlots as $slot)
                        @if($slot === '__RECESO__')
                            {{-- Fila fija de receso: siempre aparece 19:50-20:00 --}}
                            <tr class="receso-row">
                                <td class="time-col" style="opacity:.6; font-style:italic;">19:50-<br>20:00</td>
                                <td colspan="{{ count($days) }}">
                                    <div class="receso-label">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        RECESO DE ESTUDIANTES
                                    </div>
                                </td>
                            </tr>
                        @else
                            @php
                                [$start, $end] = explode(' - ', $slot);
                                $fmt_s = \Carbon\Carbon::parse($start)->format('H:i');
                                $fmt_e = \Carbon\Carbon::parse($end)->format('H:i');
                            @endphp
                            <tr>
                                <td class="time-col">{{ $fmt_s }}-<br>{{ $fmt_e }}</td>
                                @foreach($days as $day)
                                    <td style="min-width:140px">
                                        @php
                                            $cells = $schedules->filter(fn($s) =>
                                                strtolower($s->day_of_week) === strtolower($day)
                                                && $s->start_time === $start
                                            );
                                        @endphp
                                        @foreach($cells as $cs)
                                            @php $cardColor = $subjectColors[$cs->subject_id] ?? 'yellow'; @endphp
                                            <div class="class-card {{ $cardColor }}">
                                                <div class="card-title">{{ $cs->subject?->name ?? 'Materia' }}</div>
                                                <div class="card-row">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    {{ $cs->teacher?->name ?? 'Docente' }}
                                                </div>
                                                <div class="card-aula">Aula: {{ $cs->classroom?->name ?? 'N/A' }}</div>
                                            </div>
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</x-filament-panels::page>
