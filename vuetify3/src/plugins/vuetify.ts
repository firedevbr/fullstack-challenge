import { createVuetify } from 'vuetify';
import 'vuetify/styles';

export const vuetify = createVuetify({
  theme: {
    defaultTheme: 'firedev',
    themes: {
      firedev: {
        colors: {
          primary: '#ff6423', // Cor primária
          secondary: '#FF026F', // Cor secundária
        },
        variables: {
          // Define as fontes como variáveis CSS
          fontFamily: 'Ubuntu, sans-serif',
          fontFamilySecondary: 'Rubik, sans-serif',
        },
      },
    },
  },
});
