# AGENTS.md - import-configuration

## Zweck & Verantwortung

Das `import-configuration` Modul definiert die **Schnittstellen und Verträge** für Konfiguration im Pacemaker Import-System. Es ist ein **Tier 0 Modul** ohne externe TechDivision-Abhängigkeiten und dient als Basis für konkrete Konfiguration-Implementierungen (z.B. JMS-basiert).

**Hauptverantwortung:**
- Definition von Konfiguration-Interfaces
- Standardisierung von Konfigurations-Verträgen
- Ermöglichung austauschbarer Konfiguration-Implementierungen

## Architektur & Design Patterns

### Interfaces (Utility Classes)
- **ConfigurationInterface**: Haupt-Konfiguration für Import-Operationen
- **OperationConfigurationInterface**: Konfiguration für einzelne Operationen
- **PluginConfigurationInterface**: Konfiguration für Plugins/Observer

### Verwendete Patterns
- **Interface-Heavy Design**: Nur Verträge, keine Implementierung
- **Configuration Pattern**: Zentrale Konfiguration-Verwaltung
- **Builder Pattern**: Für Konfiguration-Erstellung

## Abhängigkeiten

### Externe Pakete
- **Keine** - Tier 0 Modul mit reinen Interfaces

### TechDivision Dependencies
- **Keine** - Basis-Modul ohne interne Dependencies

### Abhängig von diesem Modul (2 Reverse Dependencies)
1. **import** - Core Framework nutzt Konfigurations-Interfaces
2. **import-cli-simple** - Transitiv über andere Module

## Wichtige Entry Points

### Interfaces
```php
// Main Configuration
ConfigurationInterface::getOperations(): array
ConfigurationInterface::getOperation($name): OperationConfigurationInterface

// Operation Configuration
OperationConfigurationInterface::getPlugins(): array
OperationConfigurationInterface::getPlugin($name): PluginConfigurationInterface

// Plugin Configuration
PluginConfigurationInterface::getConfiguration(): array
PluginConfigurationInterface::getClass(): string
```

## Events & Extension Points

**Keine Events** - Tier 0 Modul mit reinen Interfaces

## Hints für KI-Agenten

### Wichtig zu verstehen
1. **Tier 0 Modul**: Definiert nur Verträge, keine Implementierung
2. **Hierarchische Struktur**: Configuration → Operations → Plugins
3. **Keine Logik**: Nur Interface-Definitionen
4. **Zentrale Rolle**: Wird von allen Import-Operationen genutzt

### Bei Änderungen
- **Interface-Änderungen sind Breaking Changes**
- **Neue Methoden**: Müssen in allen Implementierungen hinzugefügt werden
- **Vorsicht**: Basis für JMS-Konfiguration und andere Implementierungen

## Häufige Use Cases

### XML-Konfiguration-Struktur (implementiert von JMS)
```xml
<configuration>
  <operations>
    <operation name="product">
      <plugins>
        <plugin name="validator" class="Validator" />
        <plugin name="converter" class="Converter" />
      </plugins>
    </operation>
  </operations>
</configuration>
```

### Szenarien
1. **Multi-Format Support**: XML, YAML, JSON Konfigurationen
2. **Plugin-Chain-Konfiguration**: Dynamische Plugin-Orchestrierung
3. **Per-Operation-Settings**: Unterschiedliche Configs pro Operation

## Performance-Überlegungen

- **Interface-Overhead**: Minimal - nur Getter-Calls ohne Parsing
- **Hierarchie-Depth**: Typsicherheit durch Interfaces statt Strings
- **Memory**: Konfiguration wird gecacht - nur einmalige Parse
- **Extensibility**: Neue Operation-Typen ohne Code-Änderungen

## Verwandte Module

- **import-configuration-jms**: Implementiert mit JMS-Serialisierung
- **import**: Core Framework nutzt Configuration-Interfaces
- **import-configuration** ← **diese Datei** (nur Interfaces!)

## Troubleshooting & FAQ

**Q: Wo ist die konkrete Implementierung?**
- A: Hier nicht! Schau in `import-configuration-jms` für JMS-basierte Implementation.

**Q: Kann ich eigene Configuration-Implementierung bauen?**
- A: Ja! Implementiere `ConfigurationInterface` und alle Sub-Interfaces in diesem Modul.

**Q: Interface-Änderung - was muss ich updaten?**
- A: Alle Implementierungen (z.B. JMS, YAML, JSON) müssen angepasst werden!

## Bekannte Einschränkungen

- **Nur Interfaces**: Keine konkrete Implementierung
- **Keine Parsing-Logik**: Parsing erfolgt in `import-configuration-jms`
- **Keine Validierung**: Validierung erfolgt in Implementierungen

## Zusammenfassung

`import-configuration` ist ein **minimales Tier 0 Modul**, das Schnittstellen für Import-Konfiguration definiert. Es ermöglicht verschiedene Konfiguration-Formate (JMS, YAML, etc.) ohne Abhängigkeit vom Kern-Framework.

**Für Agenten:** Verstehe dieses Modul als **Konfigurations-Verträge**, nicht als Implementierung.
