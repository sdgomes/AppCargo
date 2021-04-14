import { IonCol, IonContent, IonGrid, IonHeader, IonImg, IonLabel, IonPage, IonRow, IonThumbnail, IonTitle, IonToolbar } from '@ionic/react';
import ExploreContainer from '../components/ExploreContainer';
import './Tab2.css';

const Tab2: React.FC = () => {
  return (
    <IonPage>
     <IonHeader>
        <IonGrid style={{ padding: '0' }}>
          <IonRow>
            <IonCol style={{ padding: '0' }} size="7">
              <IonToolbar >
                <IonThumbnail className="fl">
                  <IonImg style={{ objectFit: 'fill' }} src={'../assets/images/topLogo.png'} />
                </IonThumbnail>
                <IonLabel className="logo-title">APPCARGO</IonLabel>
              </IonToolbar>
            </IonCol>
            <IonCol style={{ padding: '0' }}>ion-col</IonCol>
          </IonRow>
        </IonGrid>
      </IonHeader>
      <IonContent fullscreen>
        <IonHeader collapse="condense">
          <IonToolbar>
            <IonTitle size="large">Tab 2</IonTitle>
          </IonToolbar>
        </IonHeader>
        <ExploreContainer name="Tab 2 page" />
      </IonContent>
    </IonPage>
  );
};

export default Tab2;
