# ClubSuite Statistics

[![Nextcloud Version](https://img.shields.io/badge/Nextcloud-28--32-blue.svg)](https://nextcloud.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1--8.3-purple.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-AGPL%20v3-green.svg)](LICENSE)

> 📊 Statistiken und Berichte für Vereine.

## 📋 Übersicht

ClubSuite Statistics visualisiert Ihre Vereinsdaten:

- **Dashboard**: Übersicht aller Kennzahlen auf einen Blick
- **Mitgliederentwicklung**: Zu-/Abgänge, Altersstruktur, Verweildauer
- **Finanzen**: Einnahmen/Ausgaben-Charts, Jahresvergleich
- **Aktivitäten**: Trainings-/Probenteilnahme (wenn Training-Modul aktiv)
- **Export**: PDF-Berichte für Jahreshauptversammlung

## 🚀 Installation

### Über den Nextcloud App Store
1. **ClubSuite Core** muss installiert sein
2. Apps → Organisation → "ClubSuite Statistics" suchen
3. Installieren und aktivieren

### Manuelle Installation
```bash
cd /path/to/nextcloud/apps
git clone https://github.com/clubsuite/clubsuite-stats.git
php occ app:enable clubsuite-stats
```

## 📦 Anforderungen

| Komponente | Version |
|------------|--------|
| Nextcloud | 28 - 32 |
| PHP | 8.1 - 8.3 |
| **clubsuite-core** | erforderlich |
| Weitere Module | optional (erweitern Statistiken) |

## 🔒 DSGVO / Datenschutz

- Statistiken sind anonymisiert/aggregiert
- Keine personenbezogenen Daten in Berichten
- Zugriff nur für berechtigte Rollen

## 📄 Lizenz

AGPL v3 – Siehe [LICENSE](LICENSE)

## 🐛 Bugs & Feature Requests

[GitHub Issues](https://github.com/clubsuite/clubsuite-stats/issues)

---

© 2026 Stefan Schulz
