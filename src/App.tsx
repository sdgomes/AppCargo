import { Redirect, Route } from 'react-router-dom';
import {
  IonApp,
  IonCol,
  IonGrid,
  IonHeader,
  IonIcon,
  IonImg,
  IonLabel,
  IonRouterOutlet,
  IonRow,
  IonTabBar,
  IonTabButton,
  IonTabs,
  IonThumbnail,
  IonToolbar,
} from '@ionic/react';
import { IonReactRouter } from '@ionic/react-router';
import { chatboxEllipses, chatboxEllipsesOutline, checkboxOutline, checkmarkCircle, checkmarkCircleOutline, checkmarkCircleSharp, ellipse, home, homeOutline, settings, settingsOutline, square, triangle } from 'ionicons/icons';
import Tab1 from './pages/Tab1';
import Tab2 from './pages/Tab2';
import Tab3 from './pages/Tab3';
import Tab4 from './pages/Tab4';
import Tab5 from './pages/Tab5';

/* Core CSS required for Ionic components to work properly */
import '@ionic/react/css/core.css';

/* Basic CSS for apps built with Ionic */
import '@ionic/react/css/normalize.css';
import '@ionic/react/css/structure.css';
import '@ionic/react/css/typography.css';

/* Optional CSS utils that can be commented out */
import '@ionic/react/css/padding.css';
import '@ionic/react/css/float-elements.css';
import '@ionic/react/css/text-alignment.css';
import '@ionic/react/css/text-transformation.css';
import '@ionic/react/css/flex-utils.css';
import '@ionic/react/css/display.css';

/* Theme variables */
import './theme/variables.css';
import './theme/stylesheet.css';

const App: React.FC = () => (
  <IonApp>
    <IonHeader>
      <IonGrid style={{ padding: '0' }}>
        <IonRow>
          <IonCol style={{ padding: '0' }} size="7">
            <IonToolbar >
              <IonThumbnail className="fl">
                <IonImg style={{ objectFit: 'fill' }} src={'./assets/images/topLogo.png'} />
              </IonThumbnail>
              <IonLabel className="logo-title">APPCARGO</IonLabel>
            </IonToolbar>
          </IonCol>
          <IonCol style={{ padding: '0' }}>ion-col</IonCol>
        </IonRow>
      </IonGrid>
    </IonHeader>
    <IonReactRouter>
      <IonTabs>
        <IonRouterOutlet>
          <Route exact path="/tab1">
            <Tab1 />
          </Route>
          <Route exact path="/tab2">
            <Tab2 />
          </Route>
          <Route path="/tab3">
            <Tab3 />
          </Route>
          <Route>
            <Tab4 />
          </Route>
          <Route path="/tab5">
            <Tab5 />
          </Route>
          <Route exact path="/">
            <Redirect to="/tab1" />
          </Route>
        </IonRouterOutlet>
        <IonTabBar className="te" slot="bottom">
          <IonTabButton className="te1" tab="tab1" href="/tab1">
            <IonIcon icon={home} />
          </IonTabButton>
          <IonTabButton className="te1" tab="tab2" href="/tab2">
            <IonIcon icon={chatboxEllipses} />
          </IonTabButton>
          <IonTabButton className="club" tab="tab3" href="/tab3">
            <IonLabel className="easyway">{'CLUBE DE\nDESCONTOS'}</IonLabel>
          </IonTabButton>
          <IonTabButton className="te1" tab="tab4">
            <IonIcon icon={checkmarkCircle} />
          </IonTabButton>
          <IonTabButton className="te1" tab="tab5" href="/tab5">
            <IonIcon icon={settings} />
          </IonTabButton>
        </IonTabBar>
      </IonTabs>
    </IonReactRouter>
  </IonApp>
);

export default App;
