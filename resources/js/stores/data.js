export default [
    { 
      title: 'Autoperiferia', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Autoperiferia',
      cards: [
        { title: 'Fichajes', permission: 'Fichajes', icon:'calendar-alt', iframe:'https://app.powerbi.com/view?r=eyJrIjoiNmY3ZGNmN2ItNmNiMS00ZTdhLTk4NmMtYzk5Y2I0NWZhYzNiIiwidCI6ImE1MWUyODc1LWVhMWMtNDU3YS04YjBiLWZhNDliMjhmNjJjZSIsImMiOjl9', description:'Fichajes de los empleados de Autoperiferia'},
        { title: 'Conducción Eficiente', permission: 'Conducción Eficiente', icon:'bus-alt', iframe:'', description:'Informe de conducción eficiente'}
      ], 
      cardWithSubItem: [
        { 
          title: 'Operaciones', 
          permission: 'Operaciones', 
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la concesión 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la concesión 2023'},
            { icon:'calendar-alt', data:'2024', iframe:'', description:'Cuadro de mando de la concesión 2024'},
          ]
        },
      ]
    },
    { 
      title: 'Badajoz', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Badajoz',
      cards: [
      ], 
      cardWithSubItem: [
        { 
          title: 'Informe de Cámara', 
          permission: 'Informe de Cámara', 
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la cámara de Cascais 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la cámara de Cascais 2023'},
          ]
        },
      ]
    },
    { 
      title: 'Cascais', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Cascais',
      cards: [
      ], 
      cardWithSubItem: [
        { 
          title: 'Informe de Cámara',
          permission: 'Informe de Cámara', 
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la cámara de Cascais 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la cámara de Cascais 2023'},
          ]
        },
      ]
    },
    {
      title: 'Empresa Martín', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Martin',
      cards: [
        { title: 'Fichajes', permission: 'Fichajes',  icon:'calendar-alt', iframe:'', description:'Fichajes de los empleados de Empresa Martín'},
        { title: 'Conducción Eficiente', permission: 'Conducción Eficiente',  icon:'bus-alt', iframe:'', description:'Informe de conducción eficiente'}
      ], 
      cardWithSubItem: [
        { 
          title: 'Operaciones', 
          permission: 'Operaciones',
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la concesión 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la concesión 2023'},
            { icon:'calendar-alt', data:'2024', iframe:'', description:'Cuadro de mando de la concesión 2024'},
          ]
        },
      ]
    },
    { 
      title: 'Empresa Ruiz', 
      permission: 'Ruiz',
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      cards: [
        { title: 'Fichajes', permission: 'Fichajes', icon:'calendar-alt', iframe:'', description:'Fichajes de los empleados de Empresa Ruiz'},
        { title: 'Conducción Eficiente', permission: 'Conducción Eficiente', icon:'bus-alt', iframe:'', description:'Informe de conducción eficiente'}
      ], 
      cardWithSubItem: [
        { 
          title: 'Operaciones', 
          permission: 'Operaciones',
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la concesión 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la concesión 2023'},
            { icon:'calendar-alt', data:'2024', iframe:'', description:'Cuadro de mando de la concesión 2024'},
          ]
        },
      ]
    },
    { 
      title: 'Mallorca', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Mallorca',
      cards: [
        { title: 'Fichajes', permission: 'Fichajes', icon:'calendar-alt', iframe:'', description:'Fichajes de los empleados de Empresa Ruiz'},
        { title: 'Conducción Eficiente', permission: 'Conducción Eficiente', icon:'bus-alt', iframe:'', description:'Informe de conducción eficiente'}
      ], 
      cardWithSubItem: [
        { 
          title: 'Operaciones', 
          dropdownOpen: false, // Estado para controlar el dropdown
          permission: 'Operaciones',
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la concesión 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la concesión 2023'},
            { icon:'calendar-alt', data:'2024', iframe:'', description:'Cuadro de mando de la concesión 2024'},
          ]
        },
      ]
    },
    { 
      title: 'Ruade', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Ruade',
      cards: [
        { title: 'Ruade', permission: 'Ruade', icon:'bus-alt', iframe:'', description:'Cuadro de mando con la información de fichajes de Ruade'},
      ], 
      cardWithSubItem: [
      ]
    },
    { 
      title: 'Salamanca', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Salamanca',
      cards: [
        { title: 'Conducción Eficiente', permission: 'Conducción Eficiente', icon:'bus-alt', iframe:'', description:'Informe de conducción eficiente'}
      ], 
      cardWithSubItem: [
        { 
          title: 'Operaciones', 
          permission: 'Operaciones',
          dropdownOpen: false, // Estado para controlar el dropdown
          data: [
            { icon:'calendar-alt', data:'2022', iframe:'', description:'Cuadro de mando de la concesión 2022'},
            { icon:'calendar-alt', data:'2023', iframe:'', description:'Cuadro de mando de la concesión 2023'},
            { icon:'calendar-alt', data:'2024', iframe:'', description:'Cuadro de mando de la concesión 2024'},
          ]
        },
      ]
    },
    {
      title: 'Vanwardia', 
      img: 'https://optibus.com/wp-content/uploads/2023/08/Grupo-Ruiz-case-study-website.png',
      permission: 'Vanwardia',
      cards: [
        { title: 'Busme', permission: 'Busme', icon:'calendar-alt', iframe:'https://app.powerbi.com/view?r=eyJrIjoiMzc0ZjZlOWQtZWUyNi00ZTVkLWI5MTUtMTgyMGMxMWEzMzRlIiwidCI6ImE1MWUyODc1LWVhMWMtNDU3YS04YjBiLWZhNDliMjhmNjJjZSIsImMiOjl9', description:'Cuadro de mando con la información de Busme'},
        { title: 'Minits', permission: 'Minits', icon:'bus-alt', iframe:'https://app.powerbi.com/view?r=eyJrIjoiYTE4NmJlZWYtNjA2Zi00ZWZiLWJkYjktZDM0NWZmM2I2YmQwIiwidCI6ImE1MWUyODc1LWVhMWMtNDU3YS04YjBiLWZhNDliMjhmNjJjZSIsImMiOjl9', description:'Cuadro de mando con la información de Minits'},
      ], 
      cardWithSubItem: [
      ]
    },
  ];
  